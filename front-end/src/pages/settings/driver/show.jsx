import { useState, useEffect } from "react";
import { useParams, Link } from "react-router-dom";
import { getData } from "../../../fetchData/fetchFromApi";

function Show() {
  const { id } = useParams();
  const [driver, setDriver] = useState();
  const [loading, setLoading] = useState(false);

  const fetchData = async () => {
    setLoading(true);
    const { result } = await getData("settings/driver/show/" + id);
    setDriver(result?.data);
    setLoading(false);
  };

  useEffect(() => {
    fetchData();
  }, []);
  if (loading) {
    return <h2 className="text-center text-gray-700"> LOADING...</h2>;
  }
  return (
    <div className="container mx-auto px-4 py-8">
      <h3 className="text-center text-gray-700 font-semibold text-xl mb-6">
        Information sur {driver?.name}
      </h3>

      <div className="bg-white shadow-md rounded-lg p-6 max-w-lg mx-auto">
        <p className="text-gray-700 mb-4">
          <strong>Nom:</strong> {driver?.name}
        </p>
        <p className="text-gray-700 mb-4">
          <strong>Prénom:</strong> {driver?.lastName}
        </p>
        <p className="text-gray-700 mb-4">
          <strong>Téléphone:</strong> {driver?.phone}
        </p>
        <p className="text-gray-700 mb-4">
          <strong>Permis :</strong> {driver?.permis}
        </p>
        <div className="mb-2">
          <Link to="/settings/driver" className="border py-2 px-4 rounded">
            {" "}
            Liste chaffeurs
          </Link>
        </div>
      </div>
    </div>
  );
}
export default Show;
