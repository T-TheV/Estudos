const express = require('express');
const UsuarioController = require('../controllers/usuario.controller');
const AutenticacaoMiddleware = require('../../../middleware/autenticacao.middleware');

const router = express.Router();

// Rota para cadastrar usuário
router.post('/cadastrar', UsuarioController.cadastrar );

// Rota para obter perfil do usuário
router.get('/perfil', AutenticacaoMiddleware.autenticarToken, UsuarioController.perfil);

module.exports = router;