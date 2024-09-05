import { initializeApp } from "firebase/app";
import { getAnalytics } from "firebase/analytics";
import { getMessaging } from "firebase/messaging";

const firebaseConfig = {
    apiKey: "AIzaSyBpPUDE-rHVDAAaVdlcLZKawWBECwcRyF4",
    authDomain: "realtimechat-e4ffb.firebaseapp.com",
    projectId: "realtimechat-e4ffb",
    storageBucket: "realtimechat-e4ffb.appspot.com",
    messagingSenderId: "597597484561",
    appId: "1:597597484561:web:f70df7b3748697ec9563b0",
    measurementId: "G-MPFHXXVGWH"
  };
  
  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const analytics = getAnalytics(app);
  const messaging = getMessaging(app); 

  export { app, analytics, messaging };