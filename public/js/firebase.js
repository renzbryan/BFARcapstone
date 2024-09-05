// firebase.js

import { initializeApp } from "firebase/app";
import { getAnalytics } from "firebase/analytics";
import { getMessaging } from "firebase/messaging";

const firebaseConfig = {
  apiKey: "{{ env('FIREBASE_API_KEY') }}",
  authDomain: "{{ env('FIREBASE_AUTH_DOMAIN') }}",
  projectId: "{{ env('FIREBASE_PROJECT_ID') }}",
  storageBucket: "{{ env('FIREBASE_STORAGE_BUCKET') }}",
  messagingSenderId: "{{ env('FIREBASE_MESSAGING_SENDER_ID') }}",
  appId: "{{ env('FIREBASE_APP_ID') }}",
  measurementId: "{{ env('FIREBASE_MEASUREMENT_ID') }}"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);
const messaging = getMessaging(app);

export { app, analytics, messaging };
