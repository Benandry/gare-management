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
import {
  CreateCar,
  DeleteCar,
  EditCar,
  IndexCar,
  ShowCar,
} from "../pages/settings/car";

import {
  CreateDriver,
  DeleteDriver,
  EditDriver,
  IndexDriver,
  ShowDriver,
} from "../pages/settings/driver";

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

      <Route path="/settings">
        <Route path="car">
          <Route path="" element={<IndexCar />} />
          <Route path="create" element={<CreateCar />} />
          <Route path="show/:id" element={<ShowCar />} />
          <Route path="edit/:id" element={<EditCar />} />
          <Route path="delete/:id" element={<DeleteCar />} />
        </Route>
        <Route path="driver">
          <Route path="" element={<IndexDriver />} />
          <Route path="create" element={<CreateDriver />} />
          <Route path="show/:id" element={<ShowDriver />} />
          <Route path="edit/:id" element={<EditDriver />} />
          <Route path="delete/:id" element={<DeleteDriver />} />
        </Route>
      </Route>

      <Route path="/trips" element={<Trip />} />
      <Route path="*" element={<PageNotFound />} />
    </Routes>
  );
}

export default AppRoutes;
