const mongoose = require('mongoose');
const Schema = mongoose.Schema;

const CriptoSchema = Schema({
  id: {
    type: String,
    require: true,
  },
  nombre: {
    type: String,
    require: true,
  },
  simbolo: {
    type: String,
    require: true,
  },
  descrip: {
    type: String,
    require: true,
  },
  precio: {
    type: integer,
    require: true,
  },
  '24h': {
    type: float,
    require: true,
  },
  capitalizacion: {
    type: integer,
    require: true,
  },
});

module.exports = mongoose.model('Cripto', CriptoSchema);
