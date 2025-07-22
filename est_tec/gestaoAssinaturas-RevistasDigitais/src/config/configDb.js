const { sequelize} = require( "sequelize" )
require('dotenv').config()

const sequelize = new sequelize (
    process.env.DB_DATABASE,
    process.env.DB_USER,
    process.env.DB_PASSWORD,
    {
        host: process.env.DB_HOST,
        port: process.env.DB_PORT,
        dialect: 'postgres',
        logging: true, // Opcional -> O logging irá imprimir tudo que está sendo executado dentro do banco de dados.
    }
)

module.exports = { sequelize }