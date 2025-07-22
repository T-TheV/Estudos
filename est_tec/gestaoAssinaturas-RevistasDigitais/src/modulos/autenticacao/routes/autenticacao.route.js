const express = require('express');
const AutenticacaoController = require('../controllers/autenticacao.controller');

const router = express.Router();

// Rota para login
router.post('/login', AutenticacaoController.login);
// Rota para logout
router.post('/logout', AutenticacaoController.logout);
// Rota para refresh token
router.post('/refresh-token', AutenticacaoController.refreshToken);

module.exports = router;