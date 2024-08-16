import { useEffect, useState } from "react";
import { Link } from "react-router-dom";
import { getData } from "../../../fetchData/fetchFromApi";

function IndexDriver() {
  const [drivers, setDrivers] = useState([]);
  const [isLoading, setIsLoading] = useState([]);

  const fetchData = async () => {
    setIsLoading(true);
    const { result } = await getData("settings/driver/index");
    setDrivers(result?.data);
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
        Liste des chauffeurs
      </h3>
      <div className="flex m-4 justify-end item-center">
        <Link
          to="/settings/driver/create"
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
                Permis
              </th>
              <th scope="col" className="px-5 py-2">
                Téléphone
              </th>
              <th scope="col" className="px-5 py-2">
                Actions
              </th>
            </tr>
          </thead>
          <tbody>
            {drivers.map((driver) => {
              return (
                <tr key={driver.id}>
                  <td scope="col" className="px-5 py-2">
                    {driver.name}
                  </td>
                  <td scope="col" className="px-5 py-2">
                    {" "}
                    {driver.lastName}
                  </td>
                  <td scope="col" className="px-5 py-2">
                    {" "}
                    {driver.permis}
                  </td>
                  <td scope="col" className="px-5 py-2">
                    {" "}
                    {driver.phone}
                  </td>
                  <td scope="col" className="px-5 py-2">
                    <div className="flex justify-center gap-2 item-center">
                      <Link
                        to={`show/${driver.id}`}
                        className="py-1 px-2 rounded-md text-white text-sm bg-green-600"
                      >
                        Detail
                      </Link>

                      <Link
                        to={`edit/${driver.id}`}
                        className="py-1 px-2 rounded-md text-white text-sm bg-blue-300"
                      >
                        Modifier
                      </Link>

                      <Link
                        to={`delete/${driver.id}`}
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
export default IndexDriver;
