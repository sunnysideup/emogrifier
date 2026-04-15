<?php

declare(strict_types=1);

namespace Pelago\Emogrifier\Css;

/**
 * This class represents a series of CSS rule sets as defined in the specs: https://drafts.csswg.org/css2/#rule-sets.
 * They are optionally enclosed in a block at-rule - see https://drafts.csswg.org/css-syntax/#at-rules.
 *
 * @internal
 */
final class RuleSetList
{
    /**
     * @var list<RuleSet>
     */
    private $ruleSets = [];

    public function __construct(
        /**
         * This holds the full at-rule specification, such as `@media (min-width: 400px)`.
         * If it is empty, the rule sets are not within an at-rule.
         */
        private readonly string $atRule
    )
    {
    }

    public function getAtRule(): string
    {
        return $this->atRule;
    }

    public function appendRuleSet(RuleSet $ruleSet): self
    {
        $this->ruleSets[] = $ruleSet;

        return $this;
    }

    /**
     * @return list<RuleSet>
     */
    public function getRuleSets(): array
    {
        return $this->ruleSets;
    }
}
