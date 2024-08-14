import { useNavigate, useParams } from "react-router-dom";
import Input from "../../components/Input";
import Button from "../../components/Button";
import { useEffect, useState } from "react";
import { getData, updateData } from "../../fetchData/fetchFromApi";

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
    <form className="max-w-lg mx-auto mb-5" onSubmit={handleSubmit}>
      <Input
        handleChange={handleChange}
        value={traveler?.firstName}
        id="firstName"
        label="Nom du voyageur"
        placeholder="Entrer le nom du voyageur"
        type="text"
      />
      <Input
        handleChange={handleChange}
        value={traveler?.lastName}
        id="lastName"
        label="Prénom du voyageur"
        placeholder="Entrer le prénom du voyageur"
        type="text"
      />
      <Input
        handleChange={handleChange}
        value={traveler?.email}
        id="email"
        label="Email"
        placeholder="Entre le email du voyageur"
        type="email"
      />
      <Input
        handleChange={handleChange}
        value={traveler?.phone}
        id="phone"
        label="Numero de téléphone"
        placeholder="Entrer le numéro de téléphone"
        type="phone"
      />
      <Input
        handleChange={handleChange}
        value={traveler?.adresse}
        id="adresse"
        label="Adresse"
        placeholder="Entrer l'adresse complete numéro de téléphone"
        type="text"
      />

      <Input
        handleChange={handleChange}
        value={traveler?.travel_story}
        id="travel_story"
        label="Deja voyager"
        placeholder=".."
        type="text"
      />
      <Button type="submit" label="Modifier" color="blue" />
    </form>
  );
}

export default UpdateTraveler;
