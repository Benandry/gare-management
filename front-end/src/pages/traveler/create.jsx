import { useState } from "react";
import Button from "../../components/Button";
import Input from "../../components/Input";
import { useNavigate } from "react-router-dom";
import { postData } from "../../fetchData/fetchFromApi";

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

      <form className="max-w-lg mx-auto" onSubmit={handleSubmit}>
        <Input
          handleChange={handleChange}
          value={travelerData.firstName}
          id="firstName"
          label="Nom du voyageur"
          placeholder="Entrer le nom du voyageur"
          type="text"
        />
        <Input
          handleChange={handleChange}
          value={travelerData.lastName}
          id="lastName"
          label="Prénom du voyageur"
          placeholder="Entrer le prénom du voyageur"
          type="text"
        />
        <Input
          handleChange={handleChange}
          value={travelerData.email}
          id="email"
          label="Email"
          placeholder="Entre le email du voyageur"
          type="email"
        />
        <Input
          handleChange={handleChange}
          value={travelerData.phone}
          id="phone"
          label="Numero de téléphone"
          placeholder="Entrer le numéro de téléphone"
          type="phone"
        />
        <Input
          handleChange={handleChange}
          value={travelerData.adresse}
          id="adresse"
          label="Adresse"
          placeholder="Entrer l'adresse complete numéro de téléphone"
          type="text"
        />

        <Input
          handleChange={handleChange}
          value={travelerData.travel_story}
          id="travel_story"
          label="Deja voyager"
          placeholder=".."
          type="text"
        />
        <Button type="submit" label="Enregistrer" color="blue" />
      </form>
    </div>
  );
}

export default Create;
