// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
import { getAnalytics } from "firebase/analytics";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
    apiKey: "AIzaSyBiL-oEDvor6Cy4-bIp3d8H3wa7UR05Zck",
    authDomain: "lojaweb-44e05.firebaseapp.com",
    projectId: "lojaweb-44e05",
    storageBucket: "lojaweb-44e05.appspot.com",
    messagingSenderId: "467932217611",
    appId: "1:467932217611:web:02d5fbe18ac05057faa20e",
    measurementId: "G-SRQ319MZQ0"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);