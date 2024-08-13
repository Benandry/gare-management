import { useEffect, useState } from "react";
import getData from "../../fetchData/getData";
import { Link } from "react-router-dom";

function Traveler() {
  const [travelers, setTravelers] = useState([]);
  const [isLoading, setIsLoading] = useState(false);

  const fetchData = async () => {
    setIsLoading(true);
    const { result, loading } = await getData("traveler/index");
    setTravelers(result?.data);
    setIsLoading(false);
  };

  useEffect(() => {
    fetchData();
  }, []);

  if (isLoading) {
    return <h2 className="text-center text-gray-700"> LOADING...</h2>;
  }
  return (
    <div className="m-6">
      <h3 className=" m-4 text-center text-gray-700 font-semibold text-3xl">
        Liste des Voyageurs
      </h3>
      <div className="flex m-4 justify-end item-center">
        <Link
          to="/traveler/create"
          className="py-2 px-4 rounded-md text-white bg-blue-600"
        >
          Créer un nouveau
        </Link>
      </div>
      <div className="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table className="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
          <thead className="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th scope="col" className="px-6 py-3">
                Nom
              </th>
              <th scope="col" className="px-6 py-3">
                Prénom
              </th>
              <th scope="col" className="px-6 py-3">
                Email
              </th>
              <th scope="col" className="px-6 py-3">
                Téléphone
              </th>
              <th scope="col" className="px-6 py-3">
                Adresse
              </th>
              <th scope="col" className="px-6 py-3">
                Actions
              </th>
            </tr>
          </thead>
          <tbody>
            {travelers.map((traveler) => {
              return (
                <tr key={traveler.id}>
                  <td scope="col" className="px-6 py-3">
                    {traveler.firstName}
                  </td>
                  <td scope="col" className="px-6 py-3">
                    {" "}
                    {traveler.lastName}
                  </td>
                  <td scope="col" className="px-6 py-3">
                    {" "}
                    {traveler.email}
                  </td>
                  <td scope="col" className="px-6 py-3">
                    {" "}
                    {traveler.phone}
                  </td>
                  <td scope="col" className="px-6 py-3">
                    {" "}
                    {traveler.adresse}
                  </td>
                  <td scope="col" className="px-6 py-3">
                    <div className="flex justify-center gap-2 item-center">
                      <Link
                        to={`/traveler/show/${traveler.id}`}
                        className="py-2 px-4 rounded-md text-white bg-green-600"
                      >
                        Detail
                      </Link>

                      <Link
                        to={`/traveler/edit${traveler.id}`}
                        className="py-2 px-4 rounded-md text-white bg-blue-300"
                      >
                        Modifier
                      </Link>

                      <Link
                        to={`/traveler/delete/${traveler.id}`}
                        className="py-2 px-4 rounded-md text-white bg-red-600"
                      >
                        Supprimer
                      </Link>
                    </div>
                  </td>
                </tr>
              );
            })}
          </tbody>
        </table>
      </div>
    </div>
  );
}

export default Traveler;
