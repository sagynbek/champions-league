import React, { useContext } from "react";
import { IWeeklyStanding } from "../types/types";

interface IContext {
  leagues: IWeeklyStanding[],
  setLeagues: React.Dispatch<React.SetStateAction<IWeeklyStanding[]>>,
  leagueRefreshKey: string,
  refreshLeagues: () => void,
}

export const LeagueContext = React.createContext<IContext | undefined>(undefined);

export const useLeagueContext = () => {
  const context = useContext(LeagueContext);
  if (!context) {
    throw new Error("Wrap with LeagueContext");
  }
  return context;
}
