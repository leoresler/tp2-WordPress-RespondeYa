// config/passport-config.js

import Administrador from '../models/Administrador.js';
import { Strategy as GoogleStrategy } from 'passport-google-oauth20';
import Jugador from '../models/Jugador.js';
import User from '../models/user.js';
import passport from 'passport';

passport.use(
  new GoogleStrategy(
    {
      clientID: process.env.GOOGLE_CLIENT_ID,
      clientSecret: process.env.GOOGLE_CLIENT_SECRET,
      callbackURL: process.env.GOOGLE_CALLBACK_URL,
    },
    async (accessToken, refreshToken, profile, done) => {
      try {
        console.log('Perfil de Google:', profile);
        console.log('Email del perfil:', profile.emails[0].value);

        // Verificar que profile.emails existe
        if (!profile.emails || !profile.emails[0]) {
          return done(new Error('No se pudo obtener el email de Google'), null);
        }

        const email = profile.emails[0].value;
        console.log('email: ', email);

        // Buscar si el usuario ya existe por email
        let user = await User.findOne({
          where: { email: email },
        });

        console.log('Usuario encontrado:', user);

        if (user) {
          // Usuario existe, retornarlo
          return done(null, user);
        }

        // Usuario no existe, crearlo
        console.log('Creando nuevo usuario...');
        user = await User.create({
          name: profile.displayName || profile.emails[0].value.split('@')[0],
          email: email,
          password: 'google-oauth-' + profile.id, // Password dummy para OAuth
          role: 'jugador',
          //puntaje: 0,
          pais: "Argentina",
          foto_perfil: null,
        });

        if (user) {
           // crea el registro para 1:1 en jugadores
            await Jugador.create({ user_id: user.id });
        }

        console.log('Usuario creado:', user.toJSON());
        return done(null, user);
      } catch (error) {
        console.error('Error en Strategy Google:', error);
        return done(error, null);
      }
    }
  )
);

// Serializar usuario (no necesario si usas JWT, pero no hace daño tenerlo)
passport.serializeUser((user, done) => {
  done(null, user.id);
});

passport.deserializeUser(async (id, done) => {
  try {
    const user = await User.findByPk(id);
    done(null, user);
  } catch (error) {
    done(error, null);
  }
});

export default passport;