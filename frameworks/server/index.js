import 'dotenv/config';
import contactRoutes from './routes/contactRoutes.js';
import cors from 'cors';
import express from 'express';

import sequelize from './models/sequelize.js';

const app = express();

// Middlewares base
app.use(express.json());
app.use(
  cors({
    origin: ['http://localhost:5173', 'http://127.0.0.1:5173'],
    credentials: true,
  })
);

// Rutas de la API

app.use('/api/contactar', contactRoutes);

const PORT = process.env.PORT || 3006;

const bootstrap = async () => {
  try {
    await sequelize.authenticate();
    //await sequelize.sync({ alter: true });
    console.log('✅ DB conectada y tablas sincronizadas');
    console.log('🔊 Levantando API en puerto:', PORT);
  } catch (e) {
    console.error('❌ Error de arranque:', e);
    process.exit(1);
  }
};

bootstrap();
