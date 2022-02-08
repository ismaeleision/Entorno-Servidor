const mongoose = require('mongoose');
const Schema = mongoose.Schema;

const CriptoSchema = Schema({
  id: {
    type: Number,
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
    type: Number,
    require: true,
  },
  dia: {
    type: Number,
    require: true,
  },
  capitalizacion: {
    type: Number,
    require: true,
  },
});

module.exports = mongoose.model('cripto', CriptoSchema);
