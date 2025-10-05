import User from "./user.js";
import bcrypt from "bcrypt";

//USER - Password
User.beforeCreate(async (user) => {
    user.password = await bcrypt.hash(user.password, 10);
});
User.beforeUpdate(async (user) => {
    if (user.changed('password')) {
        user.password = await bcrypt.hash(user.password, 10);
    }
});

export {
    User,
};
