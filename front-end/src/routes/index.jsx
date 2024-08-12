import { Routes, Route } from "react-router-dom";
import Home from "../components/home";
import Login from "../components/login/Login";
import PageNotFound from "../components/PageNotFound";
import Booking from "../pages/booking";
import Trip from "../pages/trips";
import Traveler from "../pages/traveler";
import Create from "../pages/traveler/create";

function AppRoutes() {
  return (
    <Routes>
      <Route path="/" element={<Home />} />
      <Route path="/login" element={<Login />} />
      <Route path="/booking" element={<Booking />} />
      <Route path="/traveler" element={<Traveler />} />
      <Route path="/traveler/create" element={<Create />} />
      <Route path="/trips" element={<Trip />} />
      <Route path="*" element={<PageNotFound />} />
    </Routes>
  );
}

export default AppRoutes;
