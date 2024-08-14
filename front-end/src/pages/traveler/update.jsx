import { useNavigate, useParams } from "react-router-dom";
import Input from "../../components/Input";
import Button from "../../components/Button";
import { useEffect, useState } from "react";
import { getData, updateData } from "../../fetchData/fetchFromApi";
import FormTraveler from "./form";

function UpdateTraveler() {
  const { id } = useParams();
  const [traveler, setTraveler] = useState();
  const [loading, setLoading] = useState(false);
  const navigate = useNavigate();
  const [message, setMessage] = useState("");

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

  const handleSubmit = (e) => {
    e.preventDefault();
    const response = updateData("traveler/edit/" + id, traveler);
    setMessage(response?.message);
    navigate("/traveler");
  };

  const handleChange = (e) => {
    setTraveler({ ...traveler, [e.target.name]: e.target.value });
  };
  return (
    <div>
      <h3 className=" m-4 text-center text-gray-700 font-semibold text-3xl">
        Insertion de voyageur
      </h3>
      <FormTraveler
        textButton="Enregistrer"
        handleChange={handleChange}
        handleSubmit={handleSubmit}
        travelerData={traveler}
      />
    </div>
  );
}

export default UpdateTraveler;
