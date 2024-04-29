import "./App.css";
import Community from "./Screens/Community/Community";
import LandingPage from "./Screens/LandingPage/LandingPage";
import LoginScreen from "./Screens/LoginScreen/LoginScreen";
import ProfileScreen from "./Screens/ProfileScreen/ProfileScreen";
import RegisterScreen from "./Screens/RegisterScreen/RegisterScreen";
import Footer from "./components/Footer/Footer";
import Header from "./components/Header/Header";
import { BrowserRouter, Route, Routes } from "react-router-dom";

const App = () => (
  <BrowserRouter>
    <Header />
    <main>
      <Routes>
        <Route path="/" Component={LandingPage} exact />
        <Route path="/login" Component={LoginScreen} />
        <Route path="/profile" Component={ProfileScreen} />
        <Route path="/register" Component={RegisterScreen} />
        <Route path="/community" Component={() => <Community />} />
      </Routes>
    </main>

    <Footer />
  </BrowserRouter>
);

export default App;
