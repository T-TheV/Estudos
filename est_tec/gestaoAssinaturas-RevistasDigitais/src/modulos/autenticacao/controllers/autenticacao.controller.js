const jwt = require("jsonwebtoken");
const bcript = require("bcryptjs");
const dotenv = require("dotenv");
dotenv.config();
const Usuario = require("../../usuario/models/usuario.model");

const tempo_acess_token = process.env.TEMPO_ACESS_TOKEN;
const tempo_refresh_token = process.env.TEMPO_REFRESH_TOKEN;

class AutenticacaoController {
    static gerarTokenAcesso(dadosUsuario) {
        return jwt.sign(dadosUsuario, process.env.SECRET_KEY, {
            expiresIn: tempo_acess_token
        });
    }

    static gerarRefreshToken(dadosUsuario) {
        return jwt.sign(dadosUsuario, process.env.JWT_REFRESH_SECRET, {
            expiresIn: tempo_refresh_token
        });
    }
    static async login(req, res) {
        try {
            const { email, senha } = req.body;
            if (!email || !senha) {
                return res.status(400).json({ msg: 'É necessário informar o E-mail e a senha para efetuar o login' });
            }
            const usuario = await Usuario.findOne({
                where: { email }
            });
            if (!usuario) {
                return res.status(401).json({ msg: "Usuário não encontrado!" });
            }
            const senhaCorreta = await bcript.compare(senha, usuario.senha);
            if (!senhaCorreta) {
                return res.status(400).json({ msg: "Credenciais Inválidas" });
            }
            const dadosUsuario = {
                id: usuario.id,
                nome: usuario.nome,
                email: usuario.email,
                role: usuario.role
            };
            const tokenAcesso = AutenticacaoController.gerarTokenAcesso(dadosUsuario);
            const refreshToken = AutenticacaoController.gerarRefreshToken(dadosUsuarios);

            res.cookie("refreshToken", refreshToken, {
                httpOnly: false,
                secure: process.env.NODE_ENV,
                sameStrict: 'strict',
                maxAge: 1 * 24
            })
            res.status(200).json({
                tokenAcesso,
                id: usuario.id,
                nome: usuario.nome,
                role: usuario.role,
            });
        } catch (error) {
            return res.status(500).json({ msg: "Erro ao processar o login", error: error.message });
        }
    }
    static refreshToken(req, res) {
        const { refreshToken } = req.cookies;
        if (!refreshToken) {
            return res.status(401).json({ msg: "Refresh token não fornecido" });
        }
        jwt.verify(refreshToken,
            process.env.JWT_REFRESH_SECRET,
            (error, usuario) => {
                if (error) {
                    return res.status(403).json({ msg: "Refresh token inválido" });
                }
                const novoTokenAcesso = AutenticacaoController.gerarTokenAcesso({
                    id: usuario.id,
                    nome: usuario.nome,
                    email: usuario.email,
                    role: usuario.role
                });
                res.status(200).json({ tokenAcesso: novoTokenAcesso });
            })
        }

    static logout(req, res) {
        try {
            res.clearCookie("refreshToken"), {
                httpOnly: true,
                secure: process.env.NODE_ENV === 'development',
                sameSite: 'strict'
            }
            

            res.status(200).json({ msg: "Logout realizado com sucesso" });
        }
  catch(error) {
    res.status(500).json({ msg: "Erro ao processar o logout", error: error.message });
    }
}
}
module.exports = AutenticacaoController;