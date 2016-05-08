<?php

namespace Kolter\DataBase\Models\Base;

use \Exception;
use \PDO;
use Kolter\DataBase\Models\Champions as ChildChampions;
use Kolter\DataBase\Models\ChampionsQuery as ChildChampionsQuery;
use Kolter\DataBase\Models\Map\ChampionsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'champions' table.
 *
 * 
 *
 * @method     ChildChampionsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildChampionsQuery orderByChampionid($order = Criteria::ASC) Order by the championid column
 * @method     ChildChampionsQuery orderByWinratio($order = Criteria::ASC) Order by the winratio column
 * @method     ChildChampionsQuery orderByTotalsessionsplayed($order = Criteria::ASC) Order by the totalSessionsPlayed column
 * @method     ChildChampionsQuery orderByTotalsessionswon($order = Criteria::ASC) Order by the totalSessionsWon column
 * @method     ChildChampionsQuery orderByTotalsessionslost($order = Criteria::ASC) Order by the totalSessionsLost column
 * @method     ChildChampionsQuery orderByTotalchampionkills($order = Criteria::ASC) Order by the totalChampionKills column
 * @method     ChildChampionsQuery orderByTotalassists($order = Criteria::ASC) Order by the totalAssists column
 * @method     ChildChampionsQuery orderByTotaldeathspersession($order = Criteria::ASC) Order by the totalDeathsPerSession column
 * @method     ChildChampionsQuery orderByTotalgoldearned($order = Criteria::ASC) Order by the totalGoldEarned column
 * @method     ChildChampionsQuery orderByTotaldamagedealt($order = Criteria::ASC) Order by the totalDamageDealt column
 * @method     ChildChampionsQuery orderByTotaldamagetaken($order = Criteria::ASC) Order by the totalDamageTaken column
 * @method     ChildChampionsQuery orderByPoints($order = Criteria::ASC) Order by the points column
 * @method     ChildChampionsQuery orderBySummonerid($order = Criteria::ASC) Order by the summonerid column
 * @method     ChildChampionsQuery orderByUpdateAt($order = Criteria::ASC) Order by the update_at column
 * @method     ChildChampionsQuery orderByRegion($order = Criteria::ASC) Order by the region column
 *
 * @method     ChildChampionsQuery groupById() Group by the id column
 * @method     ChildChampionsQuery groupByChampionid() Group by the championid column
 * @method     ChildChampionsQuery groupByWinratio() Group by the winratio column
 * @method     ChildChampionsQuery groupByTotalsessionsplayed() Group by the totalSessionsPlayed column
 * @method     ChildChampionsQuery groupByTotalsessionswon() Group by the totalSessionsWon column
 * @method     ChildChampionsQuery groupByTotalsessionslost() Group by the totalSessionsLost column
 * @method     ChildChampionsQuery groupByTotalchampionkills() Group by the totalChampionKills column
 * @method     ChildChampionsQuery groupByTotalassists() Group by the totalAssists column
 * @method     ChildChampionsQuery groupByTotaldeathspersession() Group by the totalDeathsPerSession column
 * @method     ChildChampionsQuery groupByTotalgoldearned() Group by the totalGoldEarned column
 * @method     ChildChampionsQuery groupByTotaldamagedealt() Group by the totalDamageDealt column
 * @method     ChildChampionsQuery groupByTotaldamagetaken() Group by the totalDamageTaken column
 * @method     ChildChampionsQuery groupByPoints() Group by the points column
 * @method     ChildChampionsQuery groupBySummonerid() Group by the summonerid column
 * @method     ChildChampionsQuery groupByUpdateAt() Group by the update_at column
 * @method     ChildChampionsQuery groupByRegion() Group by the region column
 *
 * @method     ChildChampionsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildChampionsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildChampionsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildChampionsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildChampionsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildChampionsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildChampions findOne(ConnectionInterface $con = null) Return the first ChildChampions matching the query
 * @method     ChildChampions findOneOrCreate(ConnectionInterface $con = null) Return the first ChildChampions matching the query, or a new ChildChampions object populated from the query conditions when no match is found
 *
 * @method     ChildChampions findOneById(string $id) Return the first ChildChampions filtered by the id column
 * @method     ChildChampions findOneByChampionid(int $championid) Return the first ChildChampions filtered by the championid column
 * @method     ChildChampions findOneByWinratio(int $winratio) Return the first ChildChampions filtered by the winratio column
 * @method     ChildChampions findOneByTotalsessionsplayed(int $totalSessionsPlayed) Return the first ChildChampions filtered by the totalSessionsPlayed column
 * @method     ChildChampions findOneByTotalsessionswon(int $totalSessionsWon) Return the first ChildChampions filtered by the totalSessionsWon column
 * @method     ChildChampions findOneByTotalsessionslost(int $totalSessionsLost) Return the first ChildChampions filtered by the totalSessionsLost column
 * @method     ChildChampions findOneByTotalchampionkills(int $totalChampionKills) Return the first ChildChampions filtered by the totalChampionKills column
 * @method     ChildChampions findOneByTotalassists(int $totalAssists) Return the first ChildChampions filtered by the totalAssists column
 * @method     ChildChampions findOneByTotaldeathspersession(int $totalDeathsPerSession) Return the first ChildChampions filtered by the totalDeathsPerSession column
 * @method     ChildChampions findOneByTotalgoldearned(int $totalGoldEarned) Return the first ChildChampions filtered by the totalGoldEarned column
 * @method     ChildChampions findOneByTotaldamagedealt(int $totalDamageDealt) Return the first ChildChampions filtered by the totalDamageDealt column
 * @method     ChildChampions findOneByTotaldamagetaken(int $totalDamageTaken) Return the first ChildChampions filtered by the totalDamageTaken column
 * @method     ChildChampions findOneByPoints(int $points) Return the first ChildChampions filtered by the points column
 * @method     ChildChampions findOneBySummonerid(int $summonerid) Return the first ChildChampions filtered by the summonerid column
 * @method     ChildChampions findOneByUpdateAt(string $update_at) Return the first ChildChampions filtered by the update_at column
 * @method     ChildChampions findOneByRegion(string $region) Return the first ChildChampions filtered by the region column *

 * @method     ChildChampions requirePk($key, ConnectionInterface $con = null) Return the ChildChampions by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChampions requireOne(ConnectionInterface $con = null) Return the first ChildChampions matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildChampions requireOneById(string $id) Return the first ChildChampions filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChampions requireOneByChampionid(int $championid) Return the first ChildChampions filtered by the championid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChampions requireOneByWinratio(int $winratio) Return the first ChildChampions filtered by the winratio column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChampions requireOneByTotalsessionsplayed(int $totalSessionsPlayed) Return the first ChildChampions filtered by the totalSessionsPlayed column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChampions requireOneByTotalsessionswon(int $totalSessionsWon) Return the first ChildChampions filtered by the totalSessionsWon column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChampions requireOneByTotalsessionslost(int $totalSessionsLost) Return the first ChildChampions filtered by the totalSessionsLost column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChampions requireOneByTotalchampionkills(int $totalChampionKills) Return the first ChildChampions filtered by the totalChampionKills column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChampions requireOneByTotalassists(int $totalAssists) Return the first ChildChampions filtered by the totalAssists column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChampions requireOneByTotaldeathspersession(int $totalDeathsPerSession) Return the first ChildChampions filtered by the totalDeathsPerSession column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChampions requireOneByTotalgoldearned(int $totalGoldEarned) Return the first ChildChampions filtered by the totalGoldEarned column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChampions requireOneByTotaldamagedealt(int $totalDamageDealt) Return the first ChildChampions filtered by the totalDamageDealt column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChampions requireOneByTotaldamagetaken(int $totalDamageTaken) Return the first ChildChampions filtered by the totalDamageTaken column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChampions requireOneByPoints(int $points) Return the first ChildChampions filtered by the points column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChampions requireOneBySummonerid(int $summonerid) Return the first ChildChampions filtered by the summonerid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChampions requireOneByUpdateAt(string $update_at) Return the first ChildChampions filtered by the update_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChampions requireOneByRegion(string $region) Return the first ChildChampions filtered by the region column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildChampions[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildChampions objects based on current ModelCriteria
 * @method     ChildChampions[]|ObjectCollection findById(string $id) Return ChildChampions objects filtered by the id column
 * @method     ChildChampions[]|ObjectCollection findByChampionid(int $championid) Return ChildChampions objects filtered by the championid column
 * @method     ChildChampions[]|ObjectCollection findByWinratio(int $winratio) Return ChildChampions objects filtered by the winratio column
 * @method     ChildChampions[]|ObjectCollection findByTotalsessionsplayed(int $totalSessionsPlayed) Return ChildChampions objects filtered by the totalSessionsPlayed column
 * @method     ChildChampions[]|ObjectCollection findByTotalsessionswon(int $totalSessionsWon) Return ChildChampions objects filtered by the totalSessionsWon column
 * @method     ChildChampions[]|ObjectCollection findByTotalsessionslost(int $totalSessionsLost) Return ChildChampions objects filtered by the totalSessionsLost column
 * @method     ChildChampions[]|ObjectCollection findByTotalchampionkills(int $totalChampionKills) Return ChildChampions objects filtered by the totalChampionKills column
 * @method     ChildChampions[]|ObjectCollection findByTotalassists(int $totalAssists) Return ChildChampions objects filtered by the totalAssists column
 * @method     ChildChampions[]|ObjectCollection findByTotaldeathspersession(int $totalDeathsPerSession) Return ChildChampions objects filtered by the totalDeathsPerSession column
 * @method     ChildChampions[]|ObjectCollection findByTotalgoldearned(int $totalGoldEarned) Return ChildChampions objects filtered by the totalGoldEarned column
 * @method     ChildChampions[]|ObjectCollection findByTotaldamagedealt(int $totalDamageDealt) Return ChildChampions objects filtered by the totalDamageDealt column
 * @method     ChildChampions[]|ObjectCollection findByTotaldamagetaken(int $totalDamageTaken) Return ChildChampions objects filtered by the totalDamageTaken column
 * @method     ChildChampions[]|ObjectCollection findByPoints(int $points) Return ChildChampions objects filtered by the points column
 * @method     ChildChampions[]|ObjectCollection findBySummonerid(int $summonerid) Return ChildChampions objects filtered by the summonerid column
 * @method     ChildChampions[]|ObjectCollection findByUpdateAt(string $update_at) Return ChildChampions objects filtered by the update_at column
 * @method     ChildChampions[]|ObjectCollection findByRegion(string $region) Return ChildChampions objects filtered by the region column
 * @method     ChildChampions[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ChampionsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Kolter\DataBase\Models\Base\ChampionsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'mastery', $modelName = '\\Kolter\\DataBase\\Models\\Champions', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildChampionsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildChampionsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildChampionsQuery) {
            return $criteria;
        }
        $query = new ChildChampionsQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildChampions|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ChampionsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ChampionsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildChampions A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, championid, winratio, totalSessionsPlayed, totalSessionsWon, totalSessionsLost, totalChampionKills, totalAssists, totalDeathsPerSession, totalGoldEarned, totalDamageDealt, totalDamageTaken, points, summonerid, update_at, region FROM champions WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);            
            $stmt->bindValue(':p0', $key, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildChampions $obj */
            $obj = new ChildChampions();
            $obj->hydrate($row);
            ChampionsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildChampions|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildChampionsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ChampionsTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildChampionsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ChampionsTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById('fooValue');   // WHERE id = 'fooValue'
     * $query->filterById('%fooValue%'); // WHERE id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $id The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChampionsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($id)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $id)) {
                $id = str_replace('*', '%', $id);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ChampionsTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the championid column
     *
     * Example usage:
     * <code>
     * $query->filterByChampionid(1234); // WHERE championid = 1234
     * $query->filterByChampionid(array(12, 34)); // WHERE championid IN (12, 34)
     * $query->filterByChampionid(array('min' => 12)); // WHERE championid > 12
     * </code>
     *
     * @param     mixed $championid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChampionsQuery The current query, for fluid interface
     */
    public function filterByChampionid($championid = null, $comparison = null)
    {
        if (is_array($championid)) {
            $useMinMax = false;
            if (isset($championid['min'])) {
                $this->addUsingAlias(ChampionsTableMap::COL_CHAMPIONID, $championid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($championid['max'])) {
                $this->addUsingAlias(ChampionsTableMap::COL_CHAMPIONID, $championid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChampionsTableMap::COL_CHAMPIONID, $championid, $comparison);
    }

    /**
     * Filter the query on the winratio column
     *
     * Example usage:
     * <code>
     * $query->filterByWinratio(1234); // WHERE winratio = 1234
     * $query->filterByWinratio(array(12, 34)); // WHERE winratio IN (12, 34)
     * $query->filterByWinratio(array('min' => 12)); // WHERE winratio > 12
     * </code>
     *
     * @param     mixed $winratio The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChampionsQuery The current query, for fluid interface
     */
    public function filterByWinratio($winratio = null, $comparison = null)
    {
        if (is_array($winratio)) {
            $useMinMax = false;
            if (isset($winratio['min'])) {
                $this->addUsingAlias(ChampionsTableMap::COL_WINRATIO, $winratio['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($winratio['max'])) {
                $this->addUsingAlias(ChampionsTableMap::COL_WINRATIO, $winratio['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChampionsTableMap::COL_WINRATIO, $winratio, $comparison);
    }

    /**
     * Filter the query on the totalSessionsPlayed column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalsessionsplayed(1234); // WHERE totalSessionsPlayed = 1234
     * $query->filterByTotalsessionsplayed(array(12, 34)); // WHERE totalSessionsPlayed IN (12, 34)
     * $query->filterByTotalsessionsplayed(array('min' => 12)); // WHERE totalSessionsPlayed > 12
     * </code>
     *
     * @param     mixed $totalsessionsplayed The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChampionsQuery The current query, for fluid interface
     */
    public function filterByTotalsessionsplayed($totalsessionsplayed = null, $comparison = null)
    {
        if (is_array($totalsessionsplayed)) {
            $useMinMax = false;
            if (isset($totalsessionsplayed['min'])) {
                $this->addUsingAlias(ChampionsTableMap::COL_TOTALSESSIONSPLAYED, $totalsessionsplayed['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalsessionsplayed['max'])) {
                $this->addUsingAlias(ChampionsTableMap::COL_TOTALSESSIONSPLAYED, $totalsessionsplayed['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChampionsTableMap::COL_TOTALSESSIONSPLAYED, $totalsessionsplayed, $comparison);
    }

    /**
     * Filter the query on the totalSessionsWon column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalsessionswon(1234); // WHERE totalSessionsWon = 1234
     * $query->filterByTotalsessionswon(array(12, 34)); // WHERE totalSessionsWon IN (12, 34)
     * $query->filterByTotalsessionswon(array('min' => 12)); // WHERE totalSessionsWon > 12
     * </code>
     *
     * @param     mixed $totalsessionswon The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChampionsQuery The current query, for fluid interface
     */
    public function filterByTotalsessionswon($totalsessionswon = null, $comparison = null)
    {
        if (is_array($totalsessionswon)) {
            $useMinMax = false;
            if (isset($totalsessionswon['min'])) {
                $this->addUsingAlias(ChampionsTableMap::COL_TOTALSESSIONSWON, $totalsessionswon['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalsessionswon['max'])) {
                $this->addUsingAlias(ChampionsTableMap::COL_TOTALSESSIONSWON, $totalsessionswon['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChampionsTableMap::COL_TOTALSESSIONSWON, $totalsessionswon, $comparison);
    }

    /**
     * Filter the query on the totalSessionsLost column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalsessionslost(1234); // WHERE totalSessionsLost = 1234
     * $query->filterByTotalsessionslost(array(12, 34)); // WHERE totalSessionsLost IN (12, 34)
     * $query->filterByTotalsessionslost(array('min' => 12)); // WHERE totalSessionsLost > 12
     * </code>
     *
     * @param     mixed $totalsessionslost The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChampionsQuery The current query, for fluid interface
     */
    public function filterByTotalsessionslost($totalsessionslost = null, $comparison = null)
    {
        if (is_array($totalsessionslost)) {
            $useMinMax = false;
            if (isset($totalsessionslost['min'])) {
                $this->addUsingAlias(ChampionsTableMap::COL_TOTALSESSIONSLOST, $totalsessionslost['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalsessionslost['max'])) {
                $this->addUsingAlias(ChampionsTableMap::COL_TOTALSESSIONSLOST, $totalsessionslost['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChampionsTableMap::COL_TOTALSESSIONSLOST, $totalsessionslost, $comparison);
    }

    /**
     * Filter the query on the totalChampionKills column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalchampionkills(1234); // WHERE totalChampionKills = 1234
     * $query->filterByTotalchampionkills(array(12, 34)); // WHERE totalChampionKills IN (12, 34)
     * $query->filterByTotalchampionkills(array('min' => 12)); // WHERE totalChampionKills > 12
     * </code>
     *
     * @param     mixed $totalchampionkills The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChampionsQuery The current query, for fluid interface
     */
    public function filterByTotalchampionkills($totalchampionkills = null, $comparison = null)
    {
        if (is_array($totalchampionkills)) {
            $useMinMax = false;
            if (isset($totalchampionkills['min'])) {
                $this->addUsingAlias(ChampionsTableMap::COL_TOTALCHAMPIONKILLS, $totalchampionkills['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalchampionkills['max'])) {
                $this->addUsingAlias(ChampionsTableMap::COL_TOTALCHAMPIONKILLS, $totalchampionkills['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChampionsTableMap::COL_TOTALCHAMPIONKILLS, $totalchampionkills, $comparison);
    }

    /**
     * Filter the query on the totalAssists column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalassists(1234); // WHERE totalAssists = 1234
     * $query->filterByTotalassists(array(12, 34)); // WHERE totalAssists IN (12, 34)
     * $query->filterByTotalassists(array('min' => 12)); // WHERE totalAssists > 12
     * </code>
     *
     * @param     mixed $totalassists The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChampionsQuery The current query, for fluid interface
     */
    public function filterByTotalassists($totalassists = null, $comparison = null)
    {
        if (is_array($totalassists)) {
            $useMinMax = false;
            if (isset($totalassists['min'])) {
                $this->addUsingAlias(ChampionsTableMap::COL_TOTALASSISTS, $totalassists['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalassists['max'])) {
                $this->addUsingAlias(ChampionsTableMap::COL_TOTALASSISTS, $totalassists['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChampionsTableMap::COL_TOTALASSISTS, $totalassists, $comparison);
    }

    /**
     * Filter the query on the totalDeathsPerSession column
     *
     * Example usage:
     * <code>
     * $query->filterByTotaldeathspersession(1234); // WHERE totalDeathsPerSession = 1234
     * $query->filterByTotaldeathspersession(array(12, 34)); // WHERE totalDeathsPerSession IN (12, 34)
     * $query->filterByTotaldeathspersession(array('min' => 12)); // WHERE totalDeathsPerSession > 12
     * </code>
     *
     * @param     mixed $totaldeathspersession The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChampionsQuery The current query, for fluid interface
     */
    public function filterByTotaldeathspersession($totaldeathspersession = null, $comparison = null)
    {
        if (is_array($totaldeathspersession)) {
            $useMinMax = false;
            if (isset($totaldeathspersession['min'])) {
                $this->addUsingAlias(ChampionsTableMap::COL_TOTALDEATHSPERSESSION, $totaldeathspersession['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totaldeathspersession['max'])) {
                $this->addUsingAlias(ChampionsTableMap::COL_TOTALDEATHSPERSESSION, $totaldeathspersession['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChampionsTableMap::COL_TOTALDEATHSPERSESSION, $totaldeathspersession, $comparison);
    }

    /**
     * Filter the query on the totalGoldEarned column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalgoldearned(1234); // WHERE totalGoldEarned = 1234
     * $query->filterByTotalgoldearned(array(12, 34)); // WHERE totalGoldEarned IN (12, 34)
     * $query->filterByTotalgoldearned(array('min' => 12)); // WHERE totalGoldEarned > 12
     * </code>
     *
     * @param     mixed $totalgoldearned The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChampionsQuery The current query, for fluid interface
     */
    public function filterByTotalgoldearned($totalgoldearned = null, $comparison = null)
    {
        if (is_array($totalgoldearned)) {
            $useMinMax = false;
            if (isset($totalgoldearned['min'])) {
                $this->addUsingAlias(ChampionsTableMap::COL_TOTALGOLDEARNED, $totalgoldearned['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalgoldearned['max'])) {
                $this->addUsingAlias(ChampionsTableMap::COL_TOTALGOLDEARNED, $totalgoldearned['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChampionsTableMap::COL_TOTALGOLDEARNED, $totalgoldearned, $comparison);
    }

    /**
     * Filter the query on the totalDamageDealt column
     *
     * Example usage:
     * <code>
     * $query->filterByTotaldamagedealt(1234); // WHERE totalDamageDealt = 1234
     * $query->filterByTotaldamagedealt(array(12, 34)); // WHERE totalDamageDealt IN (12, 34)
     * $query->filterByTotaldamagedealt(array('min' => 12)); // WHERE totalDamageDealt > 12
     * </code>
     *
     * @param     mixed $totaldamagedealt The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChampionsQuery The current query, for fluid interface
     */
    public function filterByTotaldamagedealt($totaldamagedealt = null, $comparison = null)
    {
        if (is_array($totaldamagedealt)) {
            $useMinMax = false;
            if (isset($totaldamagedealt['min'])) {
                $this->addUsingAlias(ChampionsTableMap::COL_TOTALDAMAGEDEALT, $totaldamagedealt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totaldamagedealt['max'])) {
                $this->addUsingAlias(ChampionsTableMap::COL_TOTALDAMAGEDEALT, $totaldamagedealt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChampionsTableMap::COL_TOTALDAMAGEDEALT, $totaldamagedealt, $comparison);
    }

    /**
     * Filter the query on the totalDamageTaken column
     *
     * Example usage:
     * <code>
     * $query->filterByTotaldamagetaken(1234); // WHERE totalDamageTaken = 1234
     * $query->filterByTotaldamagetaken(array(12, 34)); // WHERE totalDamageTaken IN (12, 34)
     * $query->filterByTotaldamagetaken(array('min' => 12)); // WHERE totalDamageTaken > 12
     * </code>
     *
     * @param     mixed $totaldamagetaken The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChampionsQuery The current query, for fluid interface
     */
    public function filterByTotaldamagetaken($totaldamagetaken = null, $comparison = null)
    {
        if (is_array($totaldamagetaken)) {
            $useMinMax = false;
            if (isset($totaldamagetaken['min'])) {
                $this->addUsingAlias(ChampionsTableMap::COL_TOTALDAMAGETAKEN, $totaldamagetaken['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totaldamagetaken['max'])) {
                $this->addUsingAlias(ChampionsTableMap::COL_TOTALDAMAGETAKEN, $totaldamagetaken['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChampionsTableMap::COL_TOTALDAMAGETAKEN, $totaldamagetaken, $comparison);
    }

    /**
     * Filter the query on the points column
     *
     * Example usage:
     * <code>
     * $query->filterByPoints(1234); // WHERE points = 1234
     * $query->filterByPoints(array(12, 34)); // WHERE points IN (12, 34)
     * $query->filterByPoints(array('min' => 12)); // WHERE points > 12
     * </code>
     *
     * @param     mixed $points The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChampionsQuery The current query, for fluid interface
     */
    public function filterByPoints($points = null, $comparison = null)
    {
        if (is_array($points)) {
            $useMinMax = false;
            if (isset($points['min'])) {
                $this->addUsingAlias(ChampionsTableMap::COL_POINTS, $points['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($points['max'])) {
                $this->addUsingAlias(ChampionsTableMap::COL_POINTS, $points['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChampionsTableMap::COL_POINTS, $points, $comparison);
    }

    /**
     * Filter the query on the summonerid column
     *
     * Example usage:
     * <code>
     * $query->filterBySummonerid(1234); // WHERE summonerid = 1234
     * $query->filterBySummonerid(array(12, 34)); // WHERE summonerid IN (12, 34)
     * $query->filterBySummonerid(array('min' => 12)); // WHERE summonerid > 12
     * </code>
     *
     * @param     mixed $summonerid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChampionsQuery The current query, for fluid interface
     */
    public function filterBySummonerid($summonerid = null, $comparison = null)
    {
        if (is_array($summonerid)) {
            $useMinMax = false;
            if (isset($summonerid['min'])) {
                $this->addUsingAlias(ChampionsTableMap::COL_SUMMONERID, $summonerid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($summonerid['max'])) {
                $this->addUsingAlias(ChampionsTableMap::COL_SUMMONERID, $summonerid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChampionsTableMap::COL_SUMMONERID, $summonerid, $comparison);
    }

    /**
     * Filter the query on the update_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdateAt('2011-03-14'); // WHERE update_at = '2011-03-14'
     * $query->filterByUpdateAt('now'); // WHERE update_at = '2011-03-14'
     * $query->filterByUpdateAt(array('max' => 'yesterday')); // WHERE update_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $updateAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChampionsQuery The current query, for fluid interface
     */
    public function filterByUpdateAt($updateAt = null, $comparison = null)
    {
        if (is_array($updateAt)) {
            $useMinMax = false;
            if (isset($updateAt['min'])) {
                $this->addUsingAlias(ChampionsTableMap::COL_UPDATE_AT, $updateAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updateAt['max'])) {
                $this->addUsingAlias(ChampionsTableMap::COL_UPDATE_AT, $updateAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChampionsTableMap::COL_UPDATE_AT, $updateAt, $comparison);
    }

    /**
     * Filter the query on the region column
     *
     * Example usage:
     * <code>
     * $query->filterByRegion('fooValue');   // WHERE region = 'fooValue'
     * $query->filterByRegion('%fooValue%'); // WHERE region LIKE '%fooValue%'
     * </code>
     *
     * @param     string $region The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChampionsQuery The current query, for fluid interface
     */
    public function filterByRegion($region = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($region)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $region)) {
                $region = str_replace('*', '%', $region);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ChampionsTableMap::COL_REGION, $region, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildChampions $champions Object to remove from the list of results
     *
     * @return $this|ChildChampionsQuery The current query, for fluid interface
     */
    public function prune($champions = null)
    {
        if ($champions) {
            $this->addUsingAlias(ChampionsTableMap::COL_ID, $champions->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the champions table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ChampionsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ChampionsTableMap::clearInstancePool();
            ChampionsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ChampionsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ChampionsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            ChampionsTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            ChampionsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ChampionsQuery
