import React, { useContext } from "react";
import { IWeek, IWeekGameStatus } from "../types/types";

interface IContext {
  weeks: IWeek[],
  activeWeek: number | undefined,
  setActiveWeek: React.Dispatch<React.SetStateAction<number | undefined>>,
  weekPlayedStatus: IWeekGameStatus,
  setWeekPlayedStatus: React.Dispatch<React.SetStateAction<IWeekGameStatus>>,
  weekCount: number,
  setWeekCount: React.Dispatch<React.SetStateAction<number>>,
}

export const WeekContext = React.createContext<IContext | undefined>(undefined);

export const useWeekContext = () => {
  const context = useContext(WeekContext);
  if (!context) {
    throw new Error("Wrap with WeekContext");
  }
  return context;
}
