
export interface ITeam {
  name: string;
  logo: string;
}
export type IWeeklyStanding = {
  id: number;
  team: ITeam;
  points: number;
  plays: number;
  wins: number;
  draws: number;
  loses: number;
  goals_for: number;
  goals_against: number;
  goals_dif: number;
}

export type ISeason = {
  id: number;
  name: string;
  weeks: number;
}

export type IMatchResult = {
  team1: ITeam;
  team2: ITeam;
  team1_score: number;
  team2_score: number;
  status: "Played";
} | {
  team1: ITeam;
  team2: ITeam;
  status: "NotPlayed";
}

export type IPrediction = {
  team: ITeam;
  percent: number;
}

export type IWeekGameStatus = | "None" | "Played" | "NotPlayed"