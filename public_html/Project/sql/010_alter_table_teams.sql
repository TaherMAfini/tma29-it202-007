ALTER TABLE `Teams` ADD CONSTRAINT `uniqueTeams` UNIQUE (`name`);

-- Add constraint to prevent duplicate team names