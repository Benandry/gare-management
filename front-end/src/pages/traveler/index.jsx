import { useEffect, useState } from "react";
import { Link } from "react-router-dom";
import { getData } from "../../fetchData/fetchFromApi";

function Traveler() {
  const [travelers, setTravelers] = useState([]);
  const [isLoading, setIsLoading] = useState(false);

  const fetchData = async () => {
    setIsLoading(true);
    const { result } = await getData("traveler/index");
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
    <div className="py-2">
      <h3 className="text-center text-gray-700 font-semibold text-xl">
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
              <th scope="col" className="px-5 py-2">
                Nom
              </th>
              <th scope="col" className="px-5 py-2">
                Prénom
              </th>
              <th scope="col" className="px-5 py-2">
                Email
              </th>
              <th scope="col" className="px-5 py-2">
                Téléphone
              </th>
              <th scope="col" className="px-5 py-2">
                Adresse
              </th>
              <th scope="col" className="px-5 py-2">
                Actions
              </th>
            </tr>
          </thead>
          <tbody>
            {travelers.map((traveler) => {
              return (
                <tr key={traveler.id}>
                  <td scope="col" className="px-5 py-2">
                    {traveler.firstName}
                  </td>
                  <td scope="col" className="px-5 py-2">
                    {" "}
                    {traveler.lastName}
                  </td>
                  <td scope="col" className="px-5 py-2">
                    {" "}
                    {traveler.email}
                  </td>
                  <td scope="col" className="px-5 py-2">
                    {" "}
                    {traveler.phone}
                  </td>
                  <td scope="col" className="px-5 py-2">
                    {" "}
                    {traveler.adresse}
                  </td>
                  <td scope="col" className="px-5 py-2">
                    <div className="flex justify-center gap-2 item-center">
                      <Link
                        to={`/traveler/show/${traveler.id}`}
                        className="py-1 px-2 rounded-md text-white text-sm bg-green-600"
                      >
                        Detail
                      </Link>

                      <Link
                        to={`/traveler/edit/${traveler.id}`}
                        className="py-1 px-2 rounded-md text-white text-sm bg-blue-300"
                      >
                        Modifier
                      </Link>

                      <Link
                        to={`/traveler/delete/${traveler.id}`}
                        className="py-1 px-2 rounded-md text-white text-sm bg-red-600"
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
        {/* <Pagination currentPage={} nextPage={} totalPages={} /> */}
      </div>
    </div>
  );
}

export default Traveler;
