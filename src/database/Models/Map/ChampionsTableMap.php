<?php

namespace Kolter\DataBase\Models\Map;

use Kolter\DataBase\Models\Champions;
use Kolter\DataBase\Models\ChampionsQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'champions' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class ChampionsTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Kolter.DataBase.Models.Map.ChampionsTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'mastery';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'champions';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Kolter\\DataBase\\Models\\Champions';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Kolter.DataBase.Models.Champions';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 16;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 16;

    /**
     * the column name for the id field
     */
    const COL_ID = 'champions.id';

    /**
     * the column name for the championid field
     */
    const COL_CHAMPIONID = 'champions.championid';

    /**
     * the column name for the winratio field
     */
    const COL_WINRATIO = 'champions.winratio';

    /**
     * the column name for the totalSessionsPlayed field
     */
    const COL_TOTALSESSIONSPLAYED = 'champions.totalSessionsPlayed';

    /**
     * the column name for the totalSessionsWon field
     */
    const COL_TOTALSESSIONSWON = 'champions.totalSessionsWon';

    /**
     * the column name for the totalSessionsLost field
     */
    const COL_TOTALSESSIONSLOST = 'champions.totalSessionsLost';

    /**
     * the column name for the totalChampionKills field
     */
    const COL_TOTALCHAMPIONKILLS = 'champions.totalChampionKills';

    /**
     * the column name for the totalAssists field
     */
    const COL_TOTALASSISTS = 'champions.totalAssists';

    /**
     * the column name for the totalDeathsPerSession field
     */
    const COL_TOTALDEATHSPERSESSION = 'champions.totalDeathsPerSession';

    /**
     * the column name for the totalGoldEarned field
     */
    const COL_TOTALGOLDEARNED = 'champions.totalGoldEarned';

    /**
     * the column name for the totalDamageDealt field
     */
    const COL_TOTALDAMAGEDEALT = 'champions.totalDamageDealt';

    /**
     * the column name for the totalDamageTaken field
     */
    const COL_TOTALDAMAGETAKEN = 'champions.totalDamageTaken';

    /**
     * the column name for the points field
     */
    const COL_POINTS = 'champions.points';

    /**
     * the column name for the summonerid field
     */
    const COL_SUMMONERID = 'champions.summonerid';

    /**
     * the column name for the update_at field
     */
    const COL_UPDATE_AT = 'champions.update_at';

    /**
     * the column name for the region field
     */
    const COL_REGION = 'champions.region';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'Championid', 'Winratio', 'Totalsessionsplayed', 'Totalsessionswon', 'Totalsessionslost', 'Totalchampionkills', 'Totalassists', 'Totaldeathspersession', 'Totalgoldearned', 'Totaldamagedealt', 'Totaldamagetaken', 'Points', 'Summonerid', 'UpdateAt', 'Region', ),
        self::TYPE_CAMELNAME     => array('id', 'championid', 'winratio', 'totalsessionsplayed', 'totalsessionswon', 'totalsessionslost', 'totalchampionkills', 'totalassists', 'totaldeathspersession', 'totalgoldearned', 'totaldamagedealt', 'totaldamagetaken', 'points', 'summonerid', 'updateAt', 'region', ),
        self::TYPE_COLNAME       => array(ChampionsTableMap::COL_ID, ChampionsTableMap::COL_CHAMPIONID, ChampionsTableMap::COL_WINRATIO, ChampionsTableMap::COL_TOTALSESSIONSPLAYED, ChampionsTableMap::COL_TOTALSESSIONSWON, ChampionsTableMap::COL_TOTALSESSIONSLOST, ChampionsTableMap::COL_TOTALCHAMPIONKILLS, ChampionsTableMap::COL_TOTALASSISTS, ChampionsTableMap::COL_TOTALDEATHSPERSESSION, ChampionsTableMap::COL_TOTALGOLDEARNED, ChampionsTableMap::COL_TOTALDAMAGEDEALT, ChampionsTableMap::COL_TOTALDAMAGETAKEN, ChampionsTableMap::COL_POINTS, ChampionsTableMap::COL_SUMMONERID, ChampionsTableMap::COL_UPDATE_AT, ChampionsTableMap::COL_REGION, ),
        self::TYPE_FIELDNAME     => array('id', 'championid', 'winratio', 'totalSessionsPlayed', 'totalSessionsWon', 'totalSessionsLost', 'totalChampionKills', 'totalAssists', 'totalDeathsPerSession', 'totalGoldEarned', 'totalDamageDealt', 'totalDamageTaken', 'points', 'summonerid', 'update_at', 'region', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Championid' => 1, 'Winratio' => 2, 'Totalsessionsplayed' => 3, 'Totalsessionswon' => 4, 'Totalsessionslost' => 5, 'Totalchampionkills' => 6, 'Totalassists' => 7, 'Totaldeathspersession' => 8, 'Totalgoldearned' => 9, 'Totaldamagedealt' => 10, 'Totaldamagetaken' => 11, 'Points' => 12, 'Summonerid' => 13, 'UpdateAt' => 14, 'Region' => 15, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'championid' => 1, 'winratio' => 2, 'totalsessionsplayed' => 3, 'totalsessionswon' => 4, 'totalsessionslost' => 5, 'totalchampionkills' => 6, 'totalassists' => 7, 'totaldeathspersession' => 8, 'totalgoldearned' => 9, 'totaldamagedealt' => 10, 'totaldamagetaken' => 11, 'points' => 12, 'summonerid' => 13, 'updateAt' => 14, 'region' => 15, ),
        self::TYPE_COLNAME       => array(ChampionsTableMap::COL_ID => 0, ChampionsTableMap::COL_CHAMPIONID => 1, ChampionsTableMap::COL_WINRATIO => 2, ChampionsTableMap::COL_TOTALSESSIONSPLAYED => 3, ChampionsTableMap::COL_TOTALSESSIONSWON => 4, ChampionsTableMap::COL_TOTALSESSIONSLOST => 5, ChampionsTableMap::COL_TOTALCHAMPIONKILLS => 6, ChampionsTableMap::COL_TOTALASSISTS => 7, ChampionsTableMap::COL_TOTALDEATHSPERSESSION => 8, ChampionsTableMap::COL_TOTALGOLDEARNED => 9, ChampionsTableMap::COL_TOTALDAMAGEDEALT => 10, ChampionsTableMap::COL_TOTALDAMAGETAKEN => 11, ChampionsTableMap::COL_POINTS => 12, ChampionsTableMap::COL_SUMMONERID => 13, ChampionsTableMap::COL_UPDATE_AT => 14, ChampionsTableMap::COL_REGION => 15, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'championid' => 1, 'winratio' => 2, 'totalSessionsPlayed' => 3, 'totalSessionsWon' => 4, 'totalSessionsLost' => 5, 'totalChampionKills' => 6, 'totalAssists' => 7, 'totalDeathsPerSession' => 8, 'totalGoldEarned' => 9, 'totalDamageDealt' => 10, 'totalDamageTaken' => 11, 'points' => 12, 'summonerid' => 13, 'update_at' => 14, 'region' => 15, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('champions');
        $this->setPhpName('Champions');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Kolter\\DataBase\\Models\\Champions');
        $this->setPackage('Kolter.DataBase.Models');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('id', 'Id', 'VARCHAR', true, 255, null);
        $this->addColumn('championid', 'Championid', 'INTEGER', false, 100, null);
        $this->addColumn('winratio', 'Winratio', 'INTEGER', false, 100, null);
        $this->addColumn('totalSessionsPlayed', 'Totalsessionsplayed', 'INTEGER', false, 100, null);
        $this->addColumn('totalSessionsWon', 'Totalsessionswon', 'INTEGER', false, 100, null);
        $this->addColumn('totalSessionsLost', 'Totalsessionslost', 'INTEGER', false, 100, null);
        $this->addColumn('totalChampionKills', 'Totalchampionkills', 'INTEGER', false, 100, null);
        $this->addColumn('totalAssists', 'Totalassists', 'INTEGER', false, 100, null);
        $this->addColumn('totalDeathsPerSession', 'Totaldeathspersession', 'INTEGER', false, 100, null);
        $this->addColumn('totalGoldEarned', 'Totalgoldearned', 'INTEGER', false, 100, null);
        $this->addColumn('totalDamageDealt', 'Totaldamagedealt', 'INTEGER', false, 100, null);
        $this->addColumn('totalDamageTaken', 'Totaldamagetaken', 'INTEGER', false, 100, null);
        $this->addColumn('points', 'Points', 'INTEGER', false, 100, null);
        $this->addColumn('summonerid', 'Summonerid', 'INTEGER', false, 100, null);
        $this->addColumn('update_at', 'UpdateAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('region', 'Region', 'VARCHAR', false, 5, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }
    
    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? ChampionsTableMap::CLASS_DEFAULT : ChampionsTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Champions object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = ChampionsTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ChampionsTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ChampionsTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ChampionsTableMap::OM_CLASS;
            /** @var Champions $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ChampionsTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();
    
        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = ChampionsTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ChampionsTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Champions $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ChampionsTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(ChampionsTableMap::COL_ID);
            $criteria->addSelectColumn(ChampionsTableMap::COL_CHAMPIONID);
            $criteria->addSelectColumn(ChampionsTableMap::COL_WINRATIO);
            $criteria->addSelectColumn(ChampionsTableMap::COL_TOTALSESSIONSPLAYED);
            $criteria->addSelectColumn(ChampionsTableMap::COL_TOTALSESSIONSWON);
            $criteria->addSelectColumn(ChampionsTableMap::COL_TOTALSESSIONSLOST);
            $criteria->addSelectColumn(ChampionsTableMap::COL_TOTALCHAMPIONKILLS);
            $criteria->addSelectColumn(ChampionsTableMap::COL_TOTALASSISTS);
            $criteria->addSelectColumn(ChampionsTableMap::COL_TOTALDEATHSPERSESSION);
            $criteria->addSelectColumn(ChampionsTableMap::COL_TOTALGOLDEARNED);
            $criteria->addSelectColumn(ChampionsTableMap::COL_TOTALDAMAGEDEALT);
            $criteria->addSelectColumn(ChampionsTableMap::COL_TOTALDAMAGETAKEN);
            $criteria->addSelectColumn(ChampionsTableMap::COL_POINTS);
            $criteria->addSelectColumn(ChampionsTableMap::COL_SUMMONERID);
            $criteria->addSelectColumn(ChampionsTableMap::COL_UPDATE_AT);
            $criteria->addSelectColumn(ChampionsTableMap::COL_REGION);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.championid');
            $criteria->addSelectColumn($alias . '.winratio');
            $criteria->addSelectColumn($alias . '.totalSessionsPlayed');
            $criteria->addSelectColumn($alias . '.totalSessionsWon');
            $criteria->addSelectColumn($alias . '.totalSessionsLost');
            $criteria->addSelectColumn($alias . '.totalChampionKills');
            $criteria->addSelectColumn($alias . '.totalAssists');
            $criteria->addSelectColumn($alias . '.totalDeathsPerSession');
            $criteria->addSelectColumn($alias . '.totalGoldEarned');
            $criteria->addSelectColumn($alias . '.totalDamageDealt');
            $criteria->addSelectColumn($alias . '.totalDamageTaken');
            $criteria->addSelectColumn($alias . '.points');
            $criteria->addSelectColumn($alias . '.summonerid');
            $criteria->addSelectColumn($alias . '.update_at');
            $criteria->addSelectColumn($alias . '.region');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(ChampionsTableMap::DATABASE_NAME)->getTable(ChampionsTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(ChampionsTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(ChampionsTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new ChampionsTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Champions or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Champions object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ChampionsTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Kolter\DataBase\Models\Champions) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ChampionsTableMap::DATABASE_NAME);
            $criteria->add(ChampionsTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = ChampionsQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ChampionsTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ChampionsTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the champions table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return ChampionsQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Champions or Criteria object.
     *
     * @param mixed               $criteria Criteria or Champions object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ChampionsTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Champions object
        }


        // Set the correct dbName
        $query = ChampionsQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // ChampionsTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
ChampionsTableMap::buildTableMap();
