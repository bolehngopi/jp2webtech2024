const { default: axios } = require("axios");

axios
    .get("http://127.0.0.1:8000/api/club")
    .then((res) => {
        console.log(res);
    }).catch((err) => {
        console.log(err);
    });