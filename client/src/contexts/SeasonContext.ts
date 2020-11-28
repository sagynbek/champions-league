import React, { useContext } from "react";
import { ISeason } from "../types/types";

interface IContext {
  seasons: ISeason[],
  setSeasons: React.Dispatch<React.SetStateAction<ISeason[]>>,
  activeSeason: number | undefined,
  setActiveSeason: React.Dispatch<React.SetStateAction<number | undefined>>,
}

export const SeasonContext = React.createContext<IContext | undefined>(undefined);

export const useSeasonContext = () => {
  const context = useContext(SeasonContext);
  if (!context) {
    throw new Error("Wrap with SeasonContext");
  }
  return context;
}
