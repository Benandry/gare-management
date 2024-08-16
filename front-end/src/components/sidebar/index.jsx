import { Link } from "react-router-dom";
import AccordionItem from "../accordion";

function Sidebar({ children }) {
  return (
    <div>
      <div className="flex h-screen">
        <div className="w-1/5 border-r-2 h-full border-gray-300 py-4 px-6">
          <div className=" h-full basis-1/2 gap-7 flex flex-col ">
            <AccordionItem title="Voyageurs">
              <div className="flex flex-col gap-2 ">
                <Link to="/traveler" className="font-normal text-sm  my-2">
                  → Liste du Voyageur
                </Link>
                <Link
                  to="/traveler/create"
                  className="font-normal text-sm  my-2"
                >
                  → Créer un voyageur
                </Link>
              </div>
            </AccordionItem>
            <AccordionItem title="Réservation">
              <div className="flex flex-col gap-2 ">
                <Link to="#" className="font-normal text-sm  my-2">
                  → Liste du réservation
                </Link>
                <Link to="#" className="font-normal text-sm  my-2">
                  → Créer un réservation
                </Link>
              </div>
            </AccordionItem>
            <AccordionItem title="Gestion de Trajets">
              <div className="flex flex-col gap-2 ">
                <Link to="#" className="font-normal text-sm  my-2">
                  → Liste du trajets
                </Link>
                <Link to="#" className="font-normal text-sm  my-2">
                  → Créer un trajets
                </Link>
              </div>
            </AccordionItem>
            <div className="mb-5">
              <AccordionItem title="Parametres">
                <div className="flex flex-col gap-2 ">
                  <Link to="/settings/car" className="font-normal text-sm my-2">
                    → Gestion de Voitures
                  </Link>
                  <Link
                    to="/settings/driver"
                    className="font-normal text-sm  my-2"
                  >
                    → Chauffeurs
                  </Link>
                </div>
              </AccordionItem>
            </div>
          </div>
        </div>
        <div className="w-4/5 py-4 px-6 h-full overflow-auto">{children}</div>
      </div>
    </div>
  );
}
export default Sidebar;
