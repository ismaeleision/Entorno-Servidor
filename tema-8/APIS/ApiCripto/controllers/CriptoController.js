const Cripto = require('../models/CriptoBD');

//Devuelve las primeras 50 criptos de la bd
async function getCripto(req, res) {
  try {
    const cripto = await Cripto.find().limit(50);
  } catch (error) {
    res.status(500).send(error);
  }
}

async function putCripto(req, res) {
  const idCripto = req.params.id;
  const params = req.body;

  try {
    const cripto = await Cripto.findByIdAndUpdate(idCripto, params);

    if (!cripto) {
      res.status(400).send({ msg: 'No se ha podido actualizar la cripto' });
    } else {
      res.status(200).send({ msg: 'Actualizacion completada' });
    }
  } catch (error) {
    res.status(500).send(error);
  }
}

//Actualiza la subida del precio de la cripto
async function upCripto(req, res) {
  const idCripto = req.params.id;
  const params = { precio: 500 };

  try {
    const cripto = await Cripto.findByIdAndUpdate(idCripto, params);

    if (!cripto) {
      res.status(400).send({ msg: 'No se ha podido actualizar la cripto' });
    } else {
      res.status(200).send({ msg: 'Actualizacion completada' });
    }
  } catch (error) {
    res.status(500).send(error);
  }
}

//Actualiza la bajada del precio de la cripto
async function downCripto(req, res) {
  const idCripto = req.params.id;
  const params = { precio: precio - 0.1 };

  try {
    const cripto = await Cripto.findByIdAndUpdate(idCripto, params);

    if (!cripto) {
      res.status(400).send({ msg: 'No se ha podido actualizar la cripto' });
    } else {
      res.status(200).send({ msg: 'Actualizacion completada' });
    }
  } catch (error) {
    res.status(500).send(error);
  }
}

//Añade una nueva cripto a la BD
async function addCripto(req, res) {
  const cripto = new Cripto();
  const params = req.body;

  cripto.id = params.id;
  cripto.nombre = params.nombre;
  cripto.simbolo = params.simbolo;
  cripto.descrip = params.descrip;
  cripto.precio = params.precio;
  cripto.dia = params.dia;
  cripto.capitalizacion = params.capitalizacion;

  try {
    const criptoStore = await cripto.save();

    if (!criptoStore) {
      res.status(400).send({ msg: 'No se ha guardado la cripto' });
    } else {
      res.status(200).send({ cripto: criptoStore });
    }
  } catch (error) {
    res.status(500).send(error);
  }
}

//obtiene la cripto con mas valor
async function getTopValue(req, res) {
  try {
    const cripto = await Cripto.findOne({ precio: -1 });
  } catch (error) {
    res.status(500).send(error);
  }
}

//Devuelve la cripto por id
async function getCriptoId(req, res) {
  try {
    const idCripto = req.params.id;
    const cripto = await Cripto.findById();

    if (!cripto) {
      res.status(400).send({ msg: 'Not found' });
    } else {
      res.status(200).send(cripto);
    }
  } catch (error) {
    res.status(500).send(error);
  }
}

//Elimina una cripto de la bd por id
async function deleteCripto(req, res) {
  const idTask = req.params.id;

  try {
    const cripto = await Cripto.findByIdAndDelete(idCripto);

    if (!cripto) {
      res.status(404).send({ msg: 'No se ha podido eliminar la tarea' });
    } else {
      res.status(200).send({ msg: 'Tarea eliminada' });
    }
  } catch (error) {
    res.status(500).send(error);
  }
}

module.exports = {
  getCripto,
  putCripto,
  upCripto,
  downCripto,
  addCripto,
  getTopValue,
  getCriptoId,
  deleteCripto,
};
