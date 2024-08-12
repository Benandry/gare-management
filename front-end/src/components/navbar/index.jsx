import * as React from "react";
import { Link } from "react-router-dom";

function Navbar() {
  return (
    <nav className="px-6 py-4 bg-blue-300 flex justify-between ">
      <div className="basis-1/2">
        <Link to="/">Acceuil</Link>
      </div>
      <div className="basis-1/2 flex justify-evenly items-center">
        <div>
          <Link to="/traveler" className=" font-normal">
            Gestion de Voyageur
          </Link>
        </div>
        <div>
          <Link to="/booking" className=" font-normal">
            Réservation{" "}
          </Link>
        </div>
        <div>
          <Link to="/trips" className=" font-normal">
            Gestion de Trajets
          </Link>
        </div>
      </div>
    </nav>
  );
}

export default Navbar;
