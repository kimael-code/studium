<template>
  <div class="tile is-ancestor">
    <div class="tile is-parent">
      <article class="tile is-child box">
        <div class="is-flex is-justify-content-space-between">
          <div class="content">
            <p class="title">Usuarios</p>
            <p class="subtitle">
              {{ $page.props.dashboardData.numUsers }} Usuarios Activos
            </p>
          </div>
          <span class="icon mr-3 is-align-items-stretch is-flex-shrink-5">
            <i class="fas fa-3x fa-users"></i>
          </span>
        </div>
      </article>
    </div>
    <div class="tile is-parent">
      <article class="tile is-child box">
        <p class="title">
          Profesores
          <span class="icon-text">
            <span class="icon">
              <i class="fas fa-chalkboard-teacher"></i>
            </span>
            <span>dinner</span>
          </span>
        </p>
        <p class="subtitle">
          {{ $page.props.dashboardData.numProfessors }} Profesores Activos
        </p>
      </article>
    </div>
    <div class="tile is-parent">
      <article class="tile is-child box">
        <p class="title">
          Estudiantes
          <span class="icon-text">
            <span class="icon">
              <i class="fas fa-user-graduate"></i>
            </span>
            <span>dinner</span>
          </span>
        </p>
        <p class="subtitle">
          {{ $page.props.dashboardData.numStudents }} Estudiantes Activos
        </p>
      </article>
    </div>
    <div class="tile is-parent">
      <article class="tile is-child box">
        <p class="title">
          Escuelas
          <span class="icon-text">
            <span class="icon">
              <i class="fas fa-school"></i>
            </span>
            <span>dinner</span>
          </span>
        </p>
        <p class="subtitle">
          {{ $page.props.dashboardData.numSchools }} Escuelas Registradas
        </p>
      </article>
    </div>
  </div>
</template>

<script>
export default {
  props: {},
};
</script>
