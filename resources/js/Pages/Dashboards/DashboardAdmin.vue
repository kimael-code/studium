<template>
  <div class="tile is-ancestor">
    <div class="tile is-parent">
      <article class="tile is-child box is-flex is-align-content-space-between">
        <div class="content is-flex-grow-1">
          <p class="title">Usuarios</p>
          <p class="subtitle">
            {{ $page.props.dashboardData.numUsers }} Usuarios Registrados
          </p>
        </div>
        <div class="fa-3x fa-fw is-align-self-center">
          <span class="icon has-text-grey-light">
            <i class="fas fa-users"></i>
          </span>
        </div>
      </article>
    </div>
    <div class="tile is-parent">
      <article class="tile is-child box is-flex is-align-content-space-between">
        <div class="content is-flex-grow-1">
          <p class="title">Profesores</p>
          <p class="subtitle">
            {{ $page.props.dashboardData.numProfessors }} Profesores Registrados
          </p>
        </div>
        <div class="fa-3x fa-fw is-align-self-center">
          <span class="icon has-text-grey-light">
            <i class="fas fa-chalkboard-teacher"></i>
          </span>
        </div>
      </article>
    </div>
    <div class="tile is-parent">
      <article class="tile is-child box is-flex is-align-content-space-between">
        <div class="content is-flex-grow-1">
          <p class="title">Estudiantes</p>
          <p class="subtitle">
            {{ $page.props.dashboardData.numStudents }} Estudiantes Registrados
          </p>
        </div>
        <div class="fa-3x fa-fw is-align-self-center">
          <span class="icon has-text-grey-light">
            <i class="fas fa-user-graduate"></i>
          </span>
        </div>
      </article>
    </div>
    <div class="tile is-parent">
      <article class="tile is-child box is-flex is-align-content-space-between">
        <div class="content is-flex-grow-1">
          <p class="title">Escuelas</p>
          <p class="subtitle">
            {{ $page.props.dashboardData.numSchools }} Escuelas Registradas
          </p>
        </div>
        <div class="fa-3x fa-fw is-align-self-center">
          <span class="icon has-text-grey-light">
            <i class="fas fa-school"></i>
          </span>
        </div>
      </article>
    </div>
  </div>
</template>

<script>
export default {
  props: {},
};
</script>
