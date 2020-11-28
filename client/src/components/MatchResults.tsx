import React, { FC, useEffect, useState } from 'react';
import { axiosInst } from '../api/Request';
import { useWeekContext } from '../contexts/WeekContext';
import { useSeasonContext } from '../contexts/SeasonContext';
import { IMatchResult, IWeekGameStatus } from '../types/types';
import { useLeagueContext } from '../contexts/LeagueContext';

interface IProps {
}
const MatchResults: FC<IProps> = (props) => {
  const { activeWeek, weekPlayedStatus, weekCount, setActiveWeek, setWeekPlayedStatus } = useWeekContext();
  const { activeSeason } = useSeasonContext();
  const { refreshLeagues } = useLeagueContext();
  const [results, setResults] = useState<IMatchResult[]>([]);

  useEffect(() => {
    if (activeWeek) {
      axiosInst.get(`/plays/${activeWeek}`)
        .then(res => {
          setResults(res.data.data);
        })
    }
    else {
      setResults([]);
    }
  }, [activeWeek]);

  useEffect(() => {
    let status: IWeekGameStatus = "None";
    if (results.length > 0) {
      status = results[0].status;
    }

    setWeekPlayedStatus(status);
  }, [results]);

  const handlePlayWholeSeason = () => {

    axiosInst.post(`simulate/season/${activeSeason}`)
      .then((res) => {
        setResults(res.data.data);
        refreshLeagues();
      })
  }
  const handlePlayMatch = () => {
    axiosInst.post(`simulate/week/${activeWeek}`)
      .then((res) => {
        setResults(res.data.data);
        refreshLeagues();
      })
  }

  if (!activeWeek) {
    return null;
  }

  const matchesContainer = results.map(match => {
    if (match.status === "Played") {
      return (
        <tr>
          <td>{match.team1.name}</td>
          <td>{match.team1_score}-{match.team2_score}</td>
          <td>{match.team2.name}</td>
        </tr>
      )
    }
    return (
      <tr>
        <td>{match.team1.name}</td>
        <td>?-?</td>
        <td>{match.team2.name}</td>
      </tr>
    )
  })

  return (
    <table>
      <thead>
        <tr>Match Results</tr>
        <tr> #{activeWeek} Week match Result </tr>
      </thead>
      <tbody>
        {matchesContainer}
      </tbody>


      <button onClick={handlePlayWholeSeason}>Play Whole Season</button>
      <button onClick={handlePlayMatch} disabled={weekPlayedStatus === "Played" || weekPlayedStatus === "None"}>Play All</button>

      <button onClick={() => { setActiveWeek(activeWeek - 1) }} disabled={activeWeek == 1}>Prev Week</button>
      <button onClick={() => { setActiveWeek(activeWeek + 1) }} disabled={weekCount == activeWeek}>Next Week</button>
    </table>
  );
}

export default MatchResults;
