ALTER TABLE `Championships` ADD CONSTRAINT `uniqueChampionships` UNIQUE (`name`);

-- Add constraint to prevent duplicate championship names