const express = require('express');
const cripto = require('../controllers/CriptoController');

const api = express.Router();

api.get('/criptoc', cripto.getCripto);
api.put('/criptoc/id/:id', cripto.putCripto);
api.put('/criptoc/up/id/:id', cripto.upCripto);
api.put('/criptoc/down/id/:id', cripto.downCripto);
api.post('/criptoc', cripto.addCripto);
api.get('/criptoc/topvalue', cripto.getTopValue);
api.get('/criptoc/id/:id', cripto.getCriptoId);
api.delete('/criptoc/id/:id', cripto.deleteCripto);

module.exports = api;
