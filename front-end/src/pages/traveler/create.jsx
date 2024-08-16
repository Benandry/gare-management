import { useState } from "react";
import { useNavigate } from "react-router-dom";
import { postData } from "../../fetchData/fetchFromApi";
import FormTraveler from "./form";

function Create() {
  const [message, setMessage] = useState("");
  const [travelerData, setTravelerData] = useState({
    firstName: "",
    lastName: "",
    email: "",
    phone: "",
    adresse: "",
    travel_story: "",
  });

  const navigate = useNavigate("");

  const postTravelerData = async (travelerData) => {
    const { result } = await postData("traveler/create", travelerData);
    setTravelerData(result?.data);
    setMessage(result?.message);
    navigate("/traveler");
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    postTravelerData(travelerData);
  };
  const handleChange = (e) => {
    setTravelerData({ ...travelerData, [e.target.name]: e.target.value });
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
        travelerData={travelerData}
      />
    </div>
  );
}

export default Create;
