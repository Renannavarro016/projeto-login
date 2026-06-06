// Importações Firebase
import { initializeApp } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-app.js";

import {
  getAuth,
  createUserWithEmailAndPassword,
  signInWithEmailAndPassword,
  onAuthStateChanged,
  signOut
} from "https://www.gstatic.com/firebasejs/10.12.2/firebase-auth.js";


// CONFIG DO FIREBASE
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyBSlJGiTok2pnEU7AIljnIQYgNKvKk0LGM",
  authDomain: "login-31a87.firebaseapp.com",
  projectId: "login-31a87",
  storageBucket: "login-31a87.firebasestorage.app",
  messagingSenderId: "742933956239",
  appId: "1:742933956239:web:bedad4886d29bcaa4cd2fa",
  measurementId: "G-6Y18DSMLYX"
};

// Inicializa
const app = initializeApp(firebaseConfig);
const auth = getAuth(app);


// ELEMENTOS
const email = document.getElementById("email");
const senha = document.getElementById("senha");

const btnLogin = document.getElementById("btnLogin");
const btnCadastro = document.getElementById("btnCadastro");


// CADASTRAR
btnCadastro.addEventListener("click", () => {

  createUserWithEmailAndPassword(
    auth,
    email.value,
    senha.value
  )

  .then((userCredential) => {
    alert("Conta criada com sucesso!");
  })

  .catch((error) => {
    alert(error.message);
  });

});


// LOGIN
btnLogin.addEventListener("click", () => {

  signInWithEmailAndPassword(
    auth,
    email.value,
    senha.value
  )

  .then((userCredential) => {
    alert("Login realizado!");
    window.location.href = "home.html";
  })

  .catch((error) => {
  alert(error.message);
  console.log(error);
  });

});


// VERIFICA LOGIN
onAuthStateChanged(auth, (user) => {

  if(user){
    console.log("Usuário logado");
  } else {
    console.log("Não logado");
  }

});