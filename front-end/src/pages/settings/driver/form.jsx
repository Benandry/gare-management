import { Link } from "react-router-dom";
import Input from "../../../components/Input";
import Button from "../../../components/Button";

export function FormDriver({ driver, handleChange, handleSubmit, textButton }) {
  return (
    <form className=" " onSubmit={handleSubmit}>
      <div className="flex justify-center gap-4">
        <div className="basis-1/2">
          <Input
            handleChange={handleChange}
            value={driver?.name}
            id="name"
            label="Nom du chauffeur"
            placeholder="Entrer le nom du chauffeur"
            type="text"
            required={true}
          />
          <Input
            handleChange={handleChange}
            value={driver?.lastName}
            id="lastName"
            label="Prénom du chauffeur"
            placeholder="Entrer le prénom du chauffeur"
            type="text"
            required={true}
          />
        </div>
        <div className="basis-1/2">
          <Input
            handleChange={handleChange}
            value={driver?.phone}
            id="phone"
            label="Numero téléphone du chauffeur"
            placeholder="Entrer le numero"
            type="text"
            required={true}
          />
          <Input
            handleChange={handleChange}
            value={driver?.permis}
            id="permis"
            label="Permis de condiure"
            placeholder="Entre le permis chauffeur"
            type="text"
            required={true}
          />
        </div>
      </div>
      <div className="flex gap-4 items-center">
        <Button type="submit" label={textButton} color="blue" />
        <Link to="/settings/driver">Listes </Link>
      </div>
    </form>
  );
}
