import { useEffect, useState } from "react";
import { Link, useParams } from "react-router-dom";
import { getData } from "../../fetchData/fetchFromApi";

function ShowTraveler() {
  const { id } = useParams();
  const [traveler, setTraveler] = useState();
  const [loading, setLoading] = useState(false);

  const fetchData = async () => {
    setLoading(true);
    const { result } = await getData("traveler/show/" + id);
    setTraveler(result?.data);
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
      <h3 className="text-center text-gray-700 font-semibold text-3xl mb-6">
        Détails du voyageur
      </h3>

      <div className="bg-white shadow-md rounded-lg p-6 max-w-lg mx-auto">
        <p className="text-gray-700 mb-4">
          <strong>Nom:</strong> {traveler?.firstName}
        </p>
        <p className="text-gray-700 mb-4">
          <strong>Prénom:</strong> {traveler?.lastName}
        </p>
        <p className="text-gray-700 mb-4">
          <strong>Email:</strong> {traveler?.email}
        </p>
        <p className="text-gray-700 mb-4">
          <strong>Téléphone:</strong> {traveler?.phone}
        </p>
        <p className="text-gray-700 mb-4">
          <strong>Adresse:</strong> {traveler?.adresse}
        </p>
        <p className="text-gray-700 mb-4">
          <strong>Historique de voyage:</strong> {traveler?.travelHistory}
        </p>
        <div className="m-2">
          <Link to="/traveler">Listes des voyageurs</Link>
        </div>
      </div>
    </div>
  );
}
export default ShowTraveler;
