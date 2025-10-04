import express from 'express';
import categoriasController from '../controllers/categoria.controller.js';

const router = express.Router();

router.get('/categorias', categoriasController.index);
router.get('/categoria/:id', categoriasController.show);
router.post('/categoria/create', categoriasController.store);
router.put('/categoria/:id', categoriasController.update);
router.delete('/categorias/:id', categoriasController.destroy);

export default router;
