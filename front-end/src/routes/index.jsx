import { Routes, Route } from "react-router-dom";
import Home from "../components/home";
import Login from "../components/login/Login";
import PageNotFound from "../components/PageNotFound";
import Booking from "../pages/booking";
import Trip from "../pages/trips";
import Traveler from "../pages/traveler";
import Create from "../pages/traveler/create";
import ShowTraveler from "../pages/traveler/show";
import UpdateTraveler from "../pages/traveler/update";
import DeleteTraveler from "../pages/traveler/delete";

function AppRoutes() {
  return (
    <Routes>
      <Route path="/" element={<Home />} />
      <Route path="/login" element={<Login />} />
      <Route path="/booking" element={<Booking />} />
      <Route path="traveler">
        <Route path="" element={<Traveler />} />
        <Route path="create" element={<Create />} />
        <Route path="show/:id" element={<ShowTraveler />} />
        <Route path="edit/:id" element={<UpdateTraveler />} />
        <Route path="delete/:id" element={<DeleteTraveler />} />
      </Route>

      <Route path="/trips" element={<Trip />} />
      <Route path="*" element={<PageNotFound />} />
    </Routes>
  );
}

export default AppRoutes;
