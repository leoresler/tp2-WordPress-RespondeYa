import "dotenv/config";

import User from '../models/user.js'
import { authMiddleware } from "../routes/authMiddleware.js";
import bcrypt from 'bcrypt';
import express from 'express';
import jwt from "jsonwebtoken";
import passport from '../config/passport-config.js';

const router = express.Router();

// Registro tradicional
router.post('/register', async (req, res) => {
    try {
        const { usuario, email, password } = req.body;
        
        // Validaciones mínimas
        if (!usuario) return res.status(400).json({ error: "El usuario es obligatorio" });
        if (!email) return res.status(400).json({ error: "El email es obligatorio" });
        if (!password) return res.status(400).json({ error: "La contraseña es obligatoria" });
        
        const exists = await User.findOne({ where: { email } });
        if (exists) return res.status(409).json({ error: "Email ya registrado" });

        // Hash de la contraseña
        const hashedPassword = await bcrypt.hash(password, 10);

        const newUser = await User.create({
            name: usuario,
            role: 'jugador',
            email,
            password: hashedPassword,
            puntaje: 0
        });
        
        const { password: _, ...userWithoutPassword } = newUser.toJSON();
        res.status(201).json(userWithoutPassword);
    } catch (error) {
        console.error('Error en registro:', error);
        res.status(400).json({ error: error.message });
    }
});

// Login tradicional
router.post("/login", async (req, res) => {
    try {
        const { email, password } = req.body;
        
        if (!email) return res.status(400).json({ error: "El email es obligatorio" });
        if (!password) return res.status(400).json({ error: "La contraseña es obligatoria" });
        if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            return res.status(400).json({ error: "Email inválido" });
        }

        const user = await User.findOne({ where: { email } });
        if (!user) {
            return res.status(404).json({ error: "Usuario inexistente" });
        }

        const ok = await bcrypt.compare(password, user.password);
        if (!ok) return res.status(401).json({ error: "Password no coincide" });

        const JWT_SECRET = process.env.JWT_SECRET || process.env.JWT_KEY;
        if (!JWT_SECRET) return res.status(500).json({ error: "JWT_KEY no configurada en el servidor" });

        const token = jwt.sign(
            { id: user.id, email: user.email, role: user.role }, 
            JWT_SECRET, 
            { expiresIn: "7d" }
        );
        
        const { id, name, email: mail, role, puntaje } = user;

        return res.status(200).json({
            token,
            user: { id, name, email: mail, role, puntaje },
        });
    } catch (err) {
        console.error("LOGIN ERR:", err);
        return res.status(500).json({ error: "Error interno" });
    }
});

// Ruta protegida para obtener usuario actual
router.get("/me", authMiddleware, (req, res) => {
    res.json(req.user);
});

// ========== RUTAS DE GOOGLE OAUTH ==========

// Iniciar autenticación con Google
router.get(
    '/google',
    passport.authenticate('google', {
        scope: ['profile', 'email'],
        session: false,
    })
);

// Callback de Google
router.get(
    '/google/callback',
    passport.authenticate('google', {
        session: false,
        failureRedirect: `${process.env.FRONTEND_URL}/login?error=auth_failed`,
    }),
    (req, res) => {
        try {
            console.log('✅ Usuario autenticado con Google:', req.user);

            if (!req.user) {
                console.error('❌ No se encontró usuario en req.user');
                return res.redirect(`${process.env.FRONTEND_URL}/login?error=no_user`);
            }

            const JWT_SECRET = process.env.JWT_SECRET || process.env.JWT_KEY;
            if (!JWT_SECRET) {
                console.error('❌ JWT_SECRET no configurado');
                return res.redirect(`${process.env.FRONTEND_URL}/login?error=jwt_error`);
            }

            // Generar JWT token
            const token = jwt.sign(
                { 
                    id: req.user.id, 
                    email: req.user.email,
                    role: req.user.role 
                },
                JWT_SECRET,
                { expiresIn: '7d' }
            );

            // Crear objeto de usuario sin password
            const userObj = {
                id: req.user.id,
                name: req.user.name,
                email: req.user.email,
                role: req.user.role,
                puntaje: req.user.puntaje,
            };

            console.log('✅ Redirigiendo al frontend con token');

            // Redirigir al frontend con el token
            res.redirect(
                `${process.env.FRONTEND_URL}/auth/google/success?token=${token}&user=${encodeURIComponent(JSON.stringify(userObj))}`
            );
        } catch (error) {
            console.error('❌ Error en callback de Google:', error);
            res.redirect(`${process.env.FRONTEND_URL}/login?error=callback_error`);
        }
    }
);

export default router;