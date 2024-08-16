import { useState, useEffect } from "react";
import { Link } from "react-router-dom";
import { getData } from "../../../fetchData/fetchFromApi";

function Car() {
  const [cars, setCars] = useState([]);
  const [isLoading, setIsLoading] = useState([]);

  const fetchData = async () => {
    setIsLoading(true);
    const { result } = await getData("settings/car/index");
    setCars(result?.data);
    setIsLoading(false);
  };

  useEffect(() => {
    fetchData();
  }, []);

  console.log(cars);
  if (isLoading) {
    return <h2 className="text-center text-gray-700"> LOADING...</h2>;
  }
  return (
    <div className="py-2">
      <h3 className="text-center text-gray-700 font-semibold text-xl">
        Liste des voitures
      </h3>
      <div className="flex m-4 justify-end item-center">
        <Link
          to="/settings/car/create"
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
                Marques
              </th>
              <th scope="col" className="px-5 py-2">
                Numero
              </th>
              <th scope="col" className="px-5 py-2">
                nombre de places
              </th>
              <th scope="col" className="px-5 py-2">
                Types
              </th>
              <th scope="col" className="px-5 py-2">
                Chaffeur
              </th>
              <th scope="col" className="px-5 py-2">
                Actions
              </th>
            </tr>
          </thead>
          <tbody>
            {cars.map((car) => {
              return (
                <tr key={car.id}>
                  <td scope="col" className="px-5 py-2">
                    {car.name}
                  </td>
                  <td scope="col" className="px-5 py-2">
                    {" "}
                    {car.marks}
                  </td>
                  <td scope="col" className="px-5 py-2">
                    {" "}
                    {car.number}
                  </td>
                  <td scope="col" className="px-5 py-2">
                    {" "}
                    {car.numberOfPlace}
                  </td>
                  <td scope="col" className="px-5 py-2">
                    {" "}
                    {car.type}
                  </td>
                  <td scope="col" className="px-5 py-2">
                    {" "}
                    {car.driver}
                  </td>
                  <td scope="col" className="px-5 py-2">
                    <div className="flex justify-center gap-2 item-center">
                      <Link
                        to={`show/${car.id}`}
                        className="py-1 px-2 rounded-md text-white text-sm bg-green-600"
                      >
                        Detail
                      </Link>

                      <Link
                        to={`edit/${car.id}`}
                        className="py-1 px-2 rounded-md text-white text-sm bg-blue-300"
                      >
                        Modifier
                      </Link>

                      <Link
                        to={`delete/${car.id}`}
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
export default Car;
