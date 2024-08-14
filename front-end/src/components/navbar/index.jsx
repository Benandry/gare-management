import * as React from "react";
import { Link } from "react-router-dom";

function Navbar() {
  return (
    <nav className="px-6 py-4 bg-blue-300 flex justify-between ">
      <div className="basis-1/2">
        <Link to="/" className="font-medium">
          Acceuil
        </Link>
      </div>
    </nav>
  );
}

export default Navbar;
