import { useEffect, useState } from "react";
import { Link } from "react-router-dom";
import Button from "../../components/Button";

function Traveler() {
  const [travelers, setTravelers] = useState([]);
  const [isLoading, setIsLoading] = useState(false);

  async function getTravelersFromApi() {
    setIsLoading(true);
    const apiTravelerResponses = await fetch(
      "https://127.0.0.1:8001/api/traveler/index",
      {
        method: "GET",
      }
    );
    const result = await apiTravelerResponses.json();
    setTravelers(result?.data);
    setIsLoading(false);
  }

  useEffect(() => {
    getTravelersFromApi();
  }, []);
  if (isLoading) {
    return <h2 className="text-center text-gray-700"> LOADING...</h2>;
  }
  return (
    <div>
      <h3 className=" m-4 text-center text-gray-700 font-semibold text-3xl">
        Liste des Voyageurs
      </h3>
      <div className="flex m-4 justify-end item-center">
        <Button to="/traveler/create" label="Créer un nouveau" />
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
