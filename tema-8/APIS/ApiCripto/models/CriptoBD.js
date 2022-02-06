const mongoose = require('mongoose');
const Schema = mongoose.Schema;

const CriptoSchema = Schema({
  id: {
    type: String,
    require: false,
  },
  nombre: {
    type: String,
    require: false,
  },
  simbolo: {
    type: String,
    require: false,
  },
  descrip: {
    type: String,
    require: false,
  },
  precio: {
    type: Number,
    require: false,
  },
  dia: {
    type: Number,
    require: false,
  },
  capitalizacion: {
    type: Number,
    require: false,
  },
});

module.exports = mongoose.model('Cripto', CriptoSchema);
