import {User} from '../models/associations.js';
import bcrypt from 'bcrypt';

const index = async (req, res) => {
  try {
    const users = await User.findAll();
    res.json(users);
  } catch (error) {
    console.error(error);
    return res.status(500).send("Internal server error");
  }
};


const show = async (req, res) => {
  const { id } = req.params;
  try {
    const user = await User.findByPk(id);
    if (!user) {
      return res.status(404).send("User not found");
    }
    res.json(user);
  } catch (error) {
    console.error(error);
    return res.status(500).send("Internal server error");
  }
};


const store = async (req, res) => {
  const { name, email, password } = req.body;
  if (!name || !email || !password) {
    return res.status(400).json({ error: "Name, email, and password are required" });
  }
  try {
    // Hash de la contraseña
    const hashedPassword = await bcrypt.hash(password, 10);
    
    const user = await User.create({ 
      name, 
      email, 
      password: hashedPassword,
      role: 'jugador' 
    });
    
    const { password: _, ...userWithoutPassword } = user.toJSON();
    res.status(201).json(userWithoutPassword);
  } catch (error) {
    if (error.name === 'SequelizeUniqueConstraintError') {
      return res.status(400).json({ error: "Email already exists" });
    }
    console.error(error);
    return res.status(500).send("Internal server error");
  }
};


const update = async (req, res) => {
  const { id } = req.params;
  const { name, email, password, puntaje } = req.body;
  try {
    const user = await User.findByPk(id);
    
    if (!user) {
      return res.status(404).send("User not found");
    }

    // Acumular puntos
        await user.increment({ puntaje });
        await user.reload();

    const payload = { name, email };
    
    if (typeof password === "string" && password.trim()) {
      payload.password = password.trim();
    }

    await user.update(payload);
    const { password: _pw, ...safe } = user.toJSON();
    res.json(safe);
  } catch (error) {
    if (error.name === 'SequelizeUniqueConstraintError') {
      return res.status(400).json({ error: "Email already exists" });
    }
    console.error(error);
    return res.status(500).send("Internal server error");
  }
};

const destroy = async (req, res) => {
  const { id } = req.params;
  try {
    const user = await User.findByPk(id);
    if (!user) {
      return res.status(404).send("User not found");
    }

    await user.destroy();
    res.status(204).send(); // No content
  } catch (error) {
    console.error(error);
    return res.status(500).send("Internal server error");
  }
};

export default {
  index,
  show,
  store,
  update,
  destroy,
};
