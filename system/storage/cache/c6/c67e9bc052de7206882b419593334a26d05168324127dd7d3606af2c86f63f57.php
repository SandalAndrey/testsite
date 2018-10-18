<?php

/* bt_laparis/template/bossthemes/footer_top.twig */
class __TwigTemplate_78505403c0e3b1ec7b7435d6ba3f06c05cc8d359a7ce1b8f181a82fd1a2f23a0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["modules"]) ? $context["modules"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["module"]) {
            echo " 
";
            // line 2
            echo $context["module"];
            echo " 
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['module'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "bt_laparis/template/bossthemes/footer_top.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  25 => 2,  19 => 1,);
    }
}
/* {% for module in modules %} */
/* {{ module }} */
/* {% endfor %}*/
