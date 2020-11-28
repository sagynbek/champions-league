import React, { FunctionComponent, useEffect } from 'react';
import { axiosInst } from '../api/Request';
import { useLeagueContext } from '../contexts/LeagueContext';
import { useSeasonContext } from '../contexts/SeasonContext';
import { useWeekContext } from '../contexts/WeekContext';


interface IProps {
}

const LeagueTable: FunctionComponent<IProps> = (props) => {
  const { leagues, setLeagues, leagueRefreshKey } = useLeagueContext();
  const { activeWeek } = useWeekContext();
  const { activeSeason } = useSeasonContext();


  useEffect(() => {
    if (activeWeek) {
      const fetchLeagueData = async () => {
        axiosInst.get(`/weekly-standings/${activeWeek}`)
          .then(res => {
            setLeagues(res.data.data);
          })
      }

      fetchLeagueData();
    }
    else {
      setLeagues([]);
    }
  }, [activeSeason, leagueRefreshKey, activeWeek]);

  if (!activeWeek) {
    return null;
  }

  const container = leagues.map(item => {
    return (
      <tr>
        <td><img src={item.team.logo} />{item.team.name}</td>
        <td>{item.points}</td>
        <td>{item.plays}</td>
        <td>{item.wins}</td>
        <td>{item.draws}</td>
        <td>{item.loses}</td>
        <td>{item.goals_dif}</td>
      </tr>
    )
  })

  return (
    <table>
      <thead>
        <tr>
          <th>Teams</th>
          <th>Pts</th>
          <th>P</th>
          <th>W</th>
          <th>D</th>
          <th>L</th>
          <th>GD</th>
        </tr>
      </thead>
      <tbody>
        {container}
      </tbody>
    </table>
  );
}

export default LeagueTable;
