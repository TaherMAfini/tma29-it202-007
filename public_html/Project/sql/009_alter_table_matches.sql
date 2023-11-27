ALTER TABLE `Matches` ADD CONSTRAINT `uniqueMatches` UNIQUE (`team1_id`, `team2_id`, `date`);

-- Add constraint to ensure 2 teams are not playing at the same date