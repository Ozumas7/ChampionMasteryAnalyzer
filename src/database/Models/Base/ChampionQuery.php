<?php

namespace Kolter\DataBase\Models\Base;

use \Exception;
use \PDO;
use Kolter\DataBase\Models\Champion as ChildChampion;
use Kolter\DataBase\Models\ChampionQuery as ChildChampionQuery;
use Kolter\DataBase\Models\Map\ChampionTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'champion' table.
 *
 * 
 *
 * @method     ChildChampionQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildChampionQuery orderByWinratio($order = Criteria::ASC) Order by the winratio column
 * @method     ChildChampionQuery orderByTotalsessionsplayed($order = Criteria::ASC) Order by the totalSessionsPlayed column
 * @method     ChildChampionQuery orderByTotalsessionswon($order = Criteria::ASC) Order by the totalSessionsWon column
 * @method     ChildChampionQuery orderByTotalsessionslost($order = Criteria::ASC) Order by the totalSessionsLost column
 * @method     ChildChampionQuery orderByTotalchampionkills($order = Criteria::ASC) Order by the totalChampionKills column
 * @method     ChildChampionQuery orderByTotalassists($order = Criteria::ASC) Order by the totalAssists column
 * @method     ChildChampionQuery orderByTotaldeathspersession($order = Criteria::ASC) Order by the totalDeathsPerSession column
 * @method     ChildChampionQuery orderByTotalgoldearned($order = Criteria::ASC) Order by the totalGoldEarned column
 * @method     ChildChampionQuery orderByTotaldamagedealt($order = Criteria::ASC) Order by the totalDamageDealt column
 * @method     ChildChampionQuery orderByTotaldamagetaken($order = Criteria::ASC) Order by the totalDamageTaken column
 * @method     ChildChampionQuery orderByPoints($order = Criteria::ASC) Order by the points column
 * @method     ChildChampionQuery orderByUpdateAt($order = Criteria::ASC) Order by the update_at column
 * @method     ChildChampionQuery orderByEntries($order = Criteria::ASC) Order by the entries column
 *
 * @method     ChildChampionQuery groupById() Group by the id column
 * @method     ChildChampionQuery groupByWinratio() Group by the winratio column
 * @method     ChildChampionQuery groupByTotalsessionsplayed() Group by the totalSessionsPlayed column
 * @method     ChildChampionQuery groupByTotalsessionswon() Group by the totalSessionsWon column
 * @method     ChildChampionQuery groupByTotalsessionslost() Group by the totalSessionsLost column
 * @method     ChildChampionQuery groupByTotalchampionkills() Group by the totalChampionKills column
 * @method     ChildChampionQuery groupByTotalassists() Group by the totalAssists column
 * @method     ChildChampionQuery groupByTotaldeathspersession() Group by the totalDeathsPerSession column
 * @method     ChildChampionQuery groupByTotalgoldearned() Group by the totalGoldEarned column
 * @method     ChildChampionQuery groupByTotaldamagedealt() Group by the totalDamageDealt column
 * @method     ChildChampionQuery groupByTotaldamagetaken() Group by the totalDamageTaken column
 * @method     ChildChampionQuery groupByPoints() Group by the points column
 * @method     ChildChampionQuery groupByUpdateAt() Group by the update_at column
 * @method     ChildChampionQuery groupByEntries() Group by the entries column
 *
 * @method     ChildChampionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildChampionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildChampionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildChampionQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildChampionQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildChampionQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildChampion findOne(ConnectionInterface $con = null) Return the first ChildChampion matching the query
 * @method     ChildChampion findOneOrCreate(ConnectionInterface $con = null) Return the first ChildChampion matching the query, or a new ChildChampion object populated from the query conditions when no match is found
 *
 * @method     ChildChampion findOneById(int $id) Return the first ChildChampion filtered by the id column
 * @method     ChildChampion findOneByWinratio(int $winratio) Return the first ChildChampion filtered by the winratio column
 * @method     ChildChampion findOneByTotalsessionsplayed(int $totalSessionsPlayed) Return the first ChildChampion filtered by the totalSessionsPlayed column
 * @method     ChildChampion findOneByTotalsessionswon(int $totalSessionsWon) Return the first ChildChampion filtered by the totalSessionsWon column
 * @method     ChildChampion findOneByTotalsessionslost(int $totalSessionsLost) Return the first ChildChampion filtered by the totalSessionsLost column
 * @method     ChildChampion findOneByTotalchampionkills(int $totalChampionKills) Return the first ChildChampion filtered by the totalChampionKills column
 * @method     ChildChampion findOneByTotalassists(int $totalAssists) Return the first ChildChampion filtered by the totalAssists column
 * @method     ChildChampion findOneByTotaldeathspersession(int $totalDeathsPerSession) Return the first ChildChampion filtered by the totalDeathsPerSession column
 * @method     ChildChampion findOneByTotalgoldearned(int $totalGoldEarned) Return the first ChildChampion filtered by the totalGoldEarned column
 * @method     ChildChampion findOneByTotaldamagedealt(int $totalDamageDealt) Return the first ChildChampion filtered by the totalDamageDealt column
 * @method     ChildChampion findOneByTotaldamagetaken(int $totalDamageTaken) Return the first ChildChampion filtered by the totalDamageTaken column
 * @method     ChildChampion findOneByPoints(int $points) Return the first ChildChampion filtered by the points column
 * @method     ChildChampion findOneByUpdateAt(string $update_at) Return the first ChildChampion filtered by the update_at column
 * @method     ChildChampion findOneByEntries(int $entries) Return the first ChildChampion filtered by the entries column *

 * @method     ChildChampion requirePk($key, ConnectionInterface $con = null) Return the ChildChampion by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChampion requireOne(ConnectionInterface $con = null) Return the first ChildChampion matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildChampion requireOneById(int $id) Return the first ChildChampion filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChampion requireOneByWinratio(int $winratio) Return the first ChildChampion filtered by the winratio column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChampion requireOneByTotalsessionsplayed(int $totalSessionsPlayed) Return the first ChildChampion filtered by the totalSessionsPlayed column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChampion requireOneByTotalsessionswon(int $totalSessionsWon) Return the first ChildChampion filtered by the totalSessionsWon column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChampion requireOneByTotalsessionslost(int $totalSessionsLost) Return the first ChildChampion filtered by the totalSessionsLost column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChampion requireOneByTotalchampionkills(int $totalChampionKills) Return the first ChildChampion filtered by the totalChampionKills column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChampion requireOneByTotalassists(int $totalAssists) Return the first ChildChampion filtered by the totalAssists column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChampion requireOneByTotaldeathspersession(int $totalDeathsPerSession) Return the first ChildChampion filtered by the totalDeathsPerSession column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChampion requireOneByTotalgoldearned(int $totalGoldEarned) Return the first ChildChampion filtered by the totalGoldEarned column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChampion requireOneByTotaldamagedealt(int $totalDamageDealt) Return the first ChildChampion filtered by the totalDamageDealt column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChampion requireOneByTotaldamagetaken(int $totalDamageTaken) Return the first ChildChampion filtered by the totalDamageTaken column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChampion requireOneByPoints(int $points) Return the first ChildChampion filtered by the points column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChampion requireOneByUpdateAt(string $update_at) Return the first ChildChampion filtered by the update_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChampion requireOneByEntries(int $entries) Return the first ChildChampion filtered by the entries column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildChampion[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildChampion objects based on current ModelCriteria
 * @method     ChildChampion[]|ObjectCollection findById(int $id) Return ChildChampion objects filtered by the id column
 * @method     ChildChampion[]|ObjectCollection findByWinratio(int $winratio) Return ChildChampion objects filtered by the winratio column
 * @method     ChildChampion[]|ObjectCollection findByTotalsessionsplayed(int $totalSessionsPlayed) Return ChildChampion objects filtered by the totalSessionsPlayed column
 * @method     ChildChampion[]|ObjectCollection findByTotalsessionswon(int $totalSessionsWon) Return ChildChampion objects filtered by the totalSessionsWon column
 * @method     ChildChampion[]|ObjectCollection findByTotalsessionslost(int $totalSessionsLost) Return ChildChampion objects filtered by the totalSessionsLost column
 * @method     ChildChampion[]|ObjectCollection findByTotalchampionkills(int $totalChampionKills) Return ChildChampion objects filtered by the totalChampionKills column
 * @method     ChildChampion[]|ObjectCollection findByTotalassists(int $totalAssists) Return ChildChampion objects filtered by the totalAssists column
 * @method     ChildChampion[]|ObjectCollection findByTotaldeathspersession(int $totalDeathsPerSession) Return ChildChampion objects filtered by the totalDeathsPerSession column
 * @method     ChildChampion[]|ObjectCollection findByTotalgoldearned(int $totalGoldEarned) Return ChildChampion objects filtered by the totalGoldEarned column
 * @method     ChildChampion[]|ObjectCollection findByTotaldamagedealt(int $totalDamageDealt) Return ChildChampion objects filtered by the totalDamageDealt column
 * @method     ChildChampion[]|ObjectCollection findByTotaldamagetaken(int $totalDamageTaken) Return ChildChampion objects filtered by the totalDamageTaken column
 * @method     ChildChampion[]|ObjectCollection findByPoints(int $points) Return ChildChampion objects filtered by the points column
 * @method     ChildChampion[]|ObjectCollection findByUpdateAt(string $update_at) Return ChildChampion objects filtered by the update_at column
 * @method     ChildChampion[]|ObjectCollection findByEntries(int $entries) Return ChildChampion objects filtered by the entries column
 * @method     ChildChampion[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ChampionQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Kolter\DataBase\Models\Base\ChampionQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'mastery', $modelName = '\\Kolter\\DataBase\\Models\\Champion', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildChampionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildChampionQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildChampionQuery) {
            return $criteria;
        }
        $query = new ChildChampionQuery();
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
     * @return ChildChampion|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ChampionTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ChampionTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildChampion A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, winratio, totalSessionsPlayed, totalSessionsWon, totalSessionsLost, totalChampionKills, totalAssists, totalDeathsPerSession, totalGoldEarned, totalDamageDealt, totalDamageTaken, points, update_at, entries FROM champion WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);            
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildChampion $obj */
            $obj = new ChildChampion();
            $obj->hydrate($row);
            ChampionTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildChampion|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildChampionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ChampionTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildChampionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ChampionTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChampionQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ChampionTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ChampionTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChampionTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildChampionQuery The current query, for fluid interface
     */
    public function filterByWinratio($winratio = null, $comparison = null)
    {
        if (is_array($winratio)) {
            $useMinMax = false;
            if (isset($winratio['min'])) {
                $this->addUsingAlias(ChampionTableMap::COL_WINRATIO, $winratio['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($winratio['max'])) {
                $this->addUsingAlias(ChampionTableMap::COL_WINRATIO, $winratio['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChampionTableMap::COL_WINRATIO, $winratio, $comparison);
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
     * @return $this|ChildChampionQuery The current query, for fluid interface
     */
    public function filterByTotalsessionsplayed($totalsessionsplayed = null, $comparison = null)
    {
        if (is_array($totalsessionsplayed)) {
            $useMinMax = false;
            if (isset($totalsessionsplayed['min'])) {
                $this->addUsingAlias(ChampionTableMap::COL_TOTALSESSIONSPLAYED, $totalsessionsplayed['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalsessionsplayed['max'])) {
                $this->addUsingAlias(ChampionTableMap::COL_TOTALSESSIONSPLAYED, $totalsessionsplayed['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChampionTableMap::COL_TOTALSESSIONSPLAYED, $totalsessionsplayed, $comparison);
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
     * @return $this|ChildChampionQuery The current query, for fluid interface
     */
    public function filterByTotalsessionswon($totalsessionswon = null, $comparison = null)
    {
        if (is_array($totalsessionswon)) {
            $useMinMax = false;
            if (isset($totalsessionswon['min'])) {
                $this->addUsingAlias(ChampionTableMap::COL_TOTALSESSIONSWON, $totalsessionswon['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalsessionswon['max'])) {
                $this->addUsingAlias(ChampionTableMap::COL_TOTALSESSIONSWON, $totalsessionswon['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChampionTableMap::COL_TOTALSESSIONSWON, $totalsessionswon, $comparison);
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
     * @return $this|ChildChampionQuery The current query, for fluid interface
     */
    public function filterByTotalsessionslost($totalsessionslost = null, $comparison = null)
    {
        if (is_array($totalsessionslost)) {
            $useMinMax = false;
            if (isset($totalsessionslost['min'])) {
                $this->addUsingAlias(ChampionTableMap::COL_TOTALSESSIONSLOST, $totalsessionslost['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalsessionslost['max'])) {
                $this->addUsingAlias(ChampionTableMap::COL_TOTALSESSIONSLOST, $totalsessionslost['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChampionTableMap::COL_TOTALSESSIONSLOST, $totalsessionslost, $comparison);
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
     * @return $this|ChildChampionQuery The current query, for fluid interface
     */
    public function filterByTotalchampionkills($totalchampionkills = null, $comparison = null)
    {
        if (is_array($totalchampionkills)) {
            $useMinMax = false;
            if (isset($totalchampionkills['min'])) {
                $this->addUsingAlias(ChampionTableMap::COL_TOTALCHAMPIONKILLS, $totalchampionkills['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalchampionkills['max'])) {
                $this->addUsingAlias(ChampionTableMap::COL_TOTALCHAMPIONKILLS, $totalchampionkills['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChampionTableMap::COL_TOTALCHAMPIONKILLS, $totalchampionkills, $comparison);
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
     * @return $this|ChildChampionQuery The current query, for fluid interface
     */
    public function filterByTotalassists($totalassists = null, $comparison = null)
    {
        if (is_array($totalassists)) {
            $useMinMax = false;
            if (isset($totalassists['min'])) {
                $this->addUsingAlias(ChampionTableMap::COL_TOTALASSISTS, $totalassists['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalassists['max'])) {
                $this->addUsingAlias(ChampionTableMap::COL_TOTALASSISTS, $totalassists['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChampionTableMap::COL_TOTALASSISTS, $totalassists, $comparison);
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
     * @return $this|ChildChampionQuery The current query, for fluid interface
     */
    public function filterByTotaldeathspersession($totaldeathspersession = null, $comparison = null)
    {
        if (is_array($totaldeathspersession)) {
            $useMinMax = false;
            if (isset($totaldeathspersession['min'])) {
                $this->addUsingAlias(ChampionTableMap::COL_TOTALDEATHSPERSESSION, $totaldeathspersession['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totaldeathspersession['max'])) {
                $this->addUsingAlias(ChampionTableMap::COL_TOTALDEATHSPERSESSION, $totaldeathspersession['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChampionTableMap::COL_TOTALDEATHSPERSESSION, $totaldeathspersession, $comparison);
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
     * @return $this|ChildChampionQuery The current query, for fluid interface
     */
    public function filterByTotalgoldearned($totalgoldearned = null, $comparison = null)
    {
        if (is_array($totalgoldearned)) {
            $useMinMax = false;
            if (isset($totalgoldearned['min'])) {
                $this->addUsingAlias(ChampionTableMap::COL_TOTALGOLDEARNED, $totalgoldearned['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalgoldearned['max'])) {
                $this->addUsingAlias(ChampionTableMap::COL_TOTALGOLDEARNED, $totalgoldearned['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChampionTableMap::COL_TOTALGOLDEARNED, $totalgoldearned, $comparison);
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
     * @return $this|ChildChampionQuery The current query, for fluid interface
     */
    public function filterByTotaldamagedealt($totaldamagedealt = null, $comparison = null)
    {
        if (is_array($totaldamagedealt)) {
            $useMinMax = false;
            if (isset($totaldamagedealt['min'])) {
                $this->addUsingAlias(ChampionTableMap::COL_TOTALDAMAGEDEALT, $totaldamagedealt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totaldamagedealt['max'])) {
                $this->addUsingAlias(ChampionTableMap::COL_TOTALDAMAGEDEALT, $totaldamagedealt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChampionTableMap::COL_TOTALDAMAGEDEALT, $totaldamagedealt, $comparison);
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
     * @return $this|ChildChampionQuery The current query, for fluid interface
     */
    public function filterByTotaldamagetaken($totaldamagetaken = null, $comparison = null)
    {
        if (is_array($totaldamagetaken)) {
            $useMinMax = false;
            if (isset($totaldamagetaken['min'])) {
                $this->addUsingAlias(ChampionTableMap::COL_TOTALDAMAGETAKEN, $totaldamagetaken['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totaldamagetaken['max'])) {
                $this->addUsingAlias(ChampionTableMap::COL_TOTALDAMAGETAKEN, $totaldamagetaken['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChampionTableMap::COL_TOTALDAMAGETAKEN, $totaldamagetaken, $comparison);
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
     * @return $this|ChildChampionQuery The current query, for fluid interface
     */
    public function filterByPoints($points = null, $comparison = null)
    {
        if (is_array($points)) {
            $useMinMax = false;
            if (isset($points['min'])) {
                $this->addUsingAlias(ChampionTableMap::COL_POINTS, $points['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($points['max'])) {
                $this->addUsingAlias(ChampionTableMap::COL_POINTS, $points['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChampionTableMap::COL_POINTS, $points, $comparison);
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
     * @return $this|ChildChampionQuery The current query, for fluid interface
     */
    public function filterByUpdateAt($updateAt = null, $comparison = null)
    {
        if (is_array($updateAt)) {
            $useMinMax = false;
            if (isset($updateAt['min'])) {
                $this->addUsingAlias(ChampionTableMap::COL_UPDATE_AT, $updateAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updateAt['max'])) {
                $this->addUsingAlias(ChampionTableMap::COL_UPDATE_AT, $updateAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChampionTableMap::COL_UPDATE_AT, $updateAt, $comparison);
    }

    /**
     * Filter the query on the entries column
     *
     * Example usage:
     * <code>
     * $query->filterByEntries(1234); // WHERE entries = 1234
     * $query->filterByEntries(array(12, 34)); // WHERE entries IN (12, 34)
     * $query->filterByEntries(array('min' => 12)); // WHERE entries > 12
     * </code>
     *
     * @param     mixed $entries The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChampionQuery The current query, for fluid interface
     */
    public function filterByEntries($entries = null, $comparison = null)
    {
        if (is_array($entries)) {
            $useMinMax = false;
            if (isset($entries['min'])) {
                $this->addUsingAlias(ChampionTableMap::COL_ENTRIES, $entries['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($entries['max'])) {
                $this->addUsingAlias(ChampionTableMap::COL_ENTRIES, $entries['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChampionTableMap::COL_ENTRIES, $entries, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildChampion $champion Object to remove from the list of results
     *
     * @return $this|ChildChampionQuery The current query, for fluid interface
     */
    public function prune($champion = null)
    {
        if ($champion) {
            $this->addUsingAlias(ChampionTableMap::COL_ID, $champion->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the champion table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ChampionTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ChampionTableMap::clearInstancePool();
            ChampionTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ChampionTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ChampionTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            ChampionTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            ChampionTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ChampionQuery
